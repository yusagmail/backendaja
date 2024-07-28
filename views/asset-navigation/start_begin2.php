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
  #myCanvasContainer { width: 100vw; height: 100vh; }
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

</div>
<div id="myCanvasContainer"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tween.js/17.3.0/Tween.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>

<script>
  // Inisialisasi scene, kamera, dan renderer
  var scene = new THREE.Scene();
  var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
  var renderer = new THREE.WebGLRenderer();
  renderer.setSize(window.innerWidth, window.innerHeight);
  var container = document.getElementById('myCanvasContainer');
  container.appendChild(renderer.domElement);

  var group = new THREE.Group();
  scene.add(group);

  // OrbitControls untuk interaksi
  var controls = new THREE.OrbitControls(camera, renderer.domElement);
  controls.enableDamping = true; // penghalusan gerakan
  controls.dampingFactor = 0.25;
  controls.screenSpacePanning = false;
  controls.minDistance = 1;
  controls.maxDistance = 1000;
  controls.maxPolarAngle = Math.PI / 2;

  // Geser titik pusat
  controls.target.set(0, 0, 0); // Pastikan target berada di tengah grid
  controls.update();

  // Membuat plane
  var planeSize = 40;
  var planeGeometry = new THREE.PlaneGeometry(planeSize, planeSize);
  var planeXY = new THREE.PlaneGeometry(10, 10);
  var planeMaterial = new THREE.MeshBasicMaterial({ color: 0xcccccc, side: THREE.DoubleSide });
  var plane = new THREE.Mesh(planeGeometry, planeMaterial);

  group.add(plane);

  camera.position.z = 50;

  // Membuat grid helper
  var gridSize = planeSize;  // Ukuran grid
  var divisions = 10; // Jumlah divisi grid
  var gridHelper = new THREE.GridHelper(gridSize, divisions);

  group.add(gridHelper);

  // Mengatur posisi dan arah kamera agar melihat dari atas
  camera.position.set(0, 50, 0); // Kamera berada di atas
  camera.lookAt(0, 0, 0); // Mengarahkan kamera ke tengah grid
  controls.update();

  // Fungsi animate untuk merender scene
  function animate() {
      requestAnimationFrame(animate);
      controls.update(); // Update OrbitControls
      renderer.render(scene, camera);
  }

  animate();
</script>
