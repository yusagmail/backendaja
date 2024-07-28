<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BankPembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visualisasi Sebaran Aset';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->registerJsFile('@web/js/jstree/three.min.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js', ['position' => \yii\web\View::POS_HEAD]);
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

<div id="denahContainer"></div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const scene = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
  const renderer = new THREE.WebGLRenderer();
  renderer.setSize(window.innerWidth, window.innerHeight);
  document.getElementById('denahContainer').appendChild(renderer.domElement);

  // Create floor
  const floorGeometry = new THREE.PlaneGeometry(100, 100);
  const floorMaterial = new THREE.MeshBasicMaterial({ color: 0xeeeeee, side: THREE.DoubleSide });
  const floor = new THREE.Mesh(floorGeometry, floorMaterial);
  floor.rotation.x = Math.PI / 2; // Rotate floor to be horizontal
  scene.add(floor);

  // Create walls
  const wallMaterial = new THREE.MeshBasicMaterial({ color: 0x808080 });

  function createWall(width, height, depth, x, y, z, rotationY = 0) {
    const wallGeometry = new THREE.BoxGeometry(width, height, depth);
    const wall = new THREE.Mesh(wallGeometry, wallMaterial);
    wall.position.set(x, y, z);
    wall.rotation.y = rotationY;
    scene.add(wall);
  }

// Outer walls
createWall(100, 2, 0.2, 0, 1, -50);  // back wall
createWall(100, 2, 0.2, 0, 1, 50);   // front wall
createWall(0.2, 2, 100, -50, 1, 0);  // left wall
createWall(0.2, 2, 100, 50, 1, 0);   // right wall

// Inner walls based on the provided room data
createWall(58.29, 2, 0.2, 20.82 - 50, 1, 0);   // Tangga Darurat wall
createWall(13.88, 2, 0.2, -50, 1, 15.6 - 50);  // Poli Penyakit kulit & Kelamin wall
createWall(13.88, 2, 0.2, -50, 1, 31.2 - 50);  // Poli Penyakit THT wall
createWall(0.2, 2, 15.6, 53.98 - 50, 1, -50);  // WC wall
createWall(0.2, 2, 15.6, 67.84 - 50, 1, -50);  // WC wall
createWall(13.88, 2, 0.2, -50, 1, 46.8 - 50);  // Poli Bedah Umum wall
createWall(13.88, 2, 0.2, -50, 1, 62.4 - 50);  // Poli Orthopedi wall
createWall(13.88, 2, 0.2, -50, 1, 78.0 - 50); // Poli Bedah Umum wall
createWall(13.88, 2, 0.2, 15.27 - 50, 1, 84.4 - 50); // Klinik Gizi / Stunting wall
createWall(13.88, 2, 0.2, 29.14 - 50, 1, 84.4 - 50); // Klinik Spesialis bedah syaraf wall
createWall(13.88, 2, 0.2, 42.99 - 50, 1, 84.4 - 50); // Klinik Spesialis Jantung wall
createWall(13.88, 2, 0.2, 56.86 - 50, 1, 84.4 - 50); // Klinik Spesialis Urologi wall
createWall(13.88, 2, 0.2, 70.71 - 50, 1, 84.4 - 50); // Poli Penyakit dalam 2 wall
createWall(13.88, 2, 23.01, 86.16 - 50, 1, 54.91 - 50); // Poli Kedokteran Nuklir wall
createWall(13.88, 2, 23.01, 86.16 - 50, 1, 31.9 - 50); // Poli Kedokteran Nuklir wall
createWall(10.68, 2, 22.31, 89.24 - 50, 1, 9.59 - 50); // LIFT wall
createWall(15.27, 2, 0.2, 84.68 - 50, 1, 84.4 - 50); // Poli Penyakit dalam 1 wall
createWall(15.27, 2, 0.2, 0 - 50, 1, 84.4 - 50);   // Poli Penyakit Syaraf wall



  // Camera setup
  camera.position.z = 20;
  camera.position.y = 10;
  camera.rotation.x = -0.5;

  const controls = new THREE.OrbitControls(camera, renderer.domElement);
  controls.enableZoom = true;
  controls.enablePan = true;

  const animate = function () {
    requestAnimationFrame(animate);
    controls.update();
    renderer.render(scene, camera);
  };

  animate();
});
</script>
