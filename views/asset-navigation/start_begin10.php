<?php

use yii\helpers\Html;
use yii\grid\GridView;

\yii\web\YiiAsset::register($this);
$this->registerJsFile('@web/js/jstree/three.min.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('@web/js/jstree/OrbitControls.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('@web/js/jstree/Tween.min.js', ['position' => \yii\web\View::POS_HEAD]);
?>

<style>
  body { margin: 0; background-color: #ffffff; }
  #myCanvasContainer { width: 100%; height: 100%; }
  canvas { display: block; }
  .controls {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 10;
  }
  .controls button {
    display: block;
    margin-bottom: 10px;
  }
</style>
<div class="controls">
    <button id="moveRight">Move Right</button>
    <button id="moveLeft">Move Left</button>
    <button id="moveUp">Move Up</button>
    <button id="moveDown">Move Down</button>
</div>
<div id="myCanvasContainer"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tween.js/17.3.0/Tween.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>

<script>
  // Membuat scene, kamera, dan renderer
  var scene = new THREE.Scene();
  var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
  var renderer = new THREE.WebGLRenderer({ antialias: true });
  renderer.setSize(window.innerWidth, window.innerHeight);
  var container = document.getElementById('myCanvasContainer');
  container.appendChild(renderer.domElement);

  // Membuat plane dengan panjang 40 di sumbu X dan lebar 40 di sumbu Y
  var planeGeometry = new THREE.PlaneGeometry(40, 40);
  var planeMaterial = new THREE.MeshBasicMaterial({ color: 0xcccccc, side: THREE.DoubleSide });
  var plane = new THREE.Mesh(planeGeometry, planeMaterial);
  scene.add(plane);

  // Menambahkan grid helper sejajar dengan plane
  var gridSize = 40; // Ukuran grid
  var gridDivisions = 20; // Jumlah divisi grid
  var gridHelper = new THREE.GridHelper(gridSize, gridDivisions);
  gridHelper.material.transparent = true;
  // Mengatur rotasi dan posisi grid helper agar sejajar dengan plane
  gridHelper.rotation.x = -Math.PI / 2; // Rotasi 90 derajat searah sumbu X agar sejajar dengan plane
  gridHelper.position.set(0, 0, 0); // Posisikan grid helper di bidang plane
  scene.add(gridHelper);

  // Mengatur posisi kamera agar melihat plane dari depan
  camera.position.z = 20;

  // OrbitControls untuk interaksi
  var controls = new THREE.OrbitControls(camera, renderer.domElement);
  controls.enableDamping = true;
  controls.dampingFactor = 0.25;
  controls.screenSpacePanning = false;
  controls.minDistance = 1;
  controls.maxDistance = 1000;
  controls.maxPolarAngle = Math.PI; // Mengizinkan rotasi penuh secara vertikal

  // Membuat kubus dengan ukuran 0.5x0.5x0.5 dan warna merah
  var geometry = new THREE.BoxGeometry(0.5, 0.5, 0.5);
  var material = new THREE.MeshBasicMaterial({ color: 0xff0000 });
  var cube = new THREE.Mesh(geometry, material);
  cube.position.set(10, 10, 0.5 / 2); // Set posisi kubus di titik (10, 10, 0.25) supaya tampak di atas plane
  scene.add(cube);

  // Fungsi untuk menggerakkan kubus
  function moveCube(dx, dy) {
    var newPosition = {
      x: cube.position.x + dx,
      y: cube.position.y + dy,
      z: cube.position.z
    };

    new TWEEN.Tween(cube.position)
      .to(newPosition, 500) // Menggerakkan kubus dalam waktu 500ms
      .easing(TWEEN.Easing.Quadratic.Out)
      .onUpdate(() => {
        controls.target.set(cube.position.x, cube.position.y, cube.position.z);
        controls.update();
      })
      .start();
  }

  // Event listener untuk tombol-tombol gerakan
  document.getElementById("moveRight").addEventListener("click", function () {
    moveCube(2, 0); // Geser kubus ke kanan
  });

  document.getElementById("moveLeft").addEventListener("click", function () {
    moveCube(-2, 0); // Geser kubus ke kiri
  });

  document.getElementById("moveUp").addEventListener("click", function () {
    moveCube(0, 2); // Geser kubus ke atas
  });

  document.getElementById("moveDown").addEventListener("click", function () {
    moveCube(0, -2); // Geser kubus ke bawah
  });

  // Mengaktifkan interaksi dua jari untuk rotasi
  var initialAngle = null;
  var initialRotation = null;

  var touchStart = (event) => {
    if (event.touches.length === 2) {
      const dx = event.touches[1].pageX - event.touches[0].pageX;
      const dy = event.touches[1].pageY - event.touches[0].pageY;
      initialAngle = Math.atan2(dy, dx);
      initialRotation = controls.target.clone();
    }
  };

  var touchMove = (event) => {
    if (event.touches.length === 2 && initialAngle !== null) {
      const dx = event.touches[1].pageX - event.touches[0].pageX;
      const dy = event.touches[1].pageY - event.touches[0].pageY;
      const angle = Math.atan2(dy, dx);
      const deltaAngle = angle - initialAngle;

      // Rotasi scene di sekitar target
      var rotationMatrix = new THREE.Matrix4().makeRotationZ(deltaAngle);
      var pivot = new THREE.Vector3(cube.position.x, cube.position.y, cube.position.z);
      controls.target.sub(pivot); // Subtract pivot point
      controls.target.applyMatrix4(rotationMatrix); // Apply rotation
      controls.target.add(pivot); // Add pivot point back

      controls.update();
      initialAngle = angle;
    }
  };

  var touchEnd = () => {
    initialAngle = null;
  };

  container.addEventListener('touchstart', touchStart, false);
  container.addEventListener('touchmove', touchMove, false);
  container.addEventListener('touchend', touchEnd, false);

  // Fungsi animate untuk merender scene
  function animate() {
    requestAnimationFrame(animate);
    TWEEN.update(); // Update Tween animations
    controls.update(); // Update OrbitControls
    renderer.render(scene, camera);
  }

  // Memulai animasi
  animate();
</script>
