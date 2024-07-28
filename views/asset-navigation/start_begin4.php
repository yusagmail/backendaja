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
  <!-- Tombol kontrol bisa ditambahkan di sini jika diperlukan -->
</div>
<div id="myCanvasContainer"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tween.js/17.3.0/Tween.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>

<script>
  // Membuat scene, kamera, dan renderer
  var scene = new THREE.Scene();
  var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
  //var renderer = new THREE.WebGLRenderer();
  var renderer = new THREE.WebGLRenderer({ antialias: true });
  renderer.setSize(window.innerWidth, window.innerHeight);
  var container = document.getElementById('myCanvasContainer');
  container.appendChild(renderer.domElement);

  // Membuat plane dengan panjang 30 di sumbu X dan lebar 20 di sumbu Y
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
  controls.maxPolarAngle = Math.PI / 2;

  //Geser titik pusat
  controls.target.set(10, 10, 0);
  controls.update();
  camera.position.x = 5;
  camera.position.y = 10; //Cara Manual
  // Set posisi kamera agar mengikuti titik pusat
  camera.position.x = controls.target.x;
  camera.position.y = controls.target.y;

  camera.near = 0.1;
  camera.far = 1000;
  camera.updateProjectionMatrix();


    // Membuat kubus dengan ukuran 1x1 dan warna merah
    var geometry = new THREE.BoxGeometry(0.5, 0.5,0.5);
var material = new THREE.MeshBasicMaterial({ color: 0xff0000 });
var cube = new THREE.Mesh(geometry, material);
cube.position.set(controls.target.x,controls.target.y,0.5/2); // Menempatkan kubus di titik (10, 10, 0)
scene.add(cube);

      //camera.position.set(20, 20, 20);
    //camera.lookAt(controls.target); // Mengarahkan kamera ke target

  // Fungsi animate untuk merender scene
  function animate() {
      requestAnimationFrame(animate);
      controls.update(); // Update OrbitControls
      renderer.render(scene, camera);
  }

  // Memulai animasi
  animate();
</script>
