<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BankPembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Navigasi Asset';
$this->params['breadcrumbs'][] = $this->title;
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
    <button id="rotateX">Rotate X</button>
    <button id="rotateY">Rotate Y</button>
    <button id="rotateZ">Rotate Z</button>
    <button id="zoomIn">Zoom In</button>
    <button id="zoomOut">Zoom Out</button>
    <button onclick="moveCameraUp()">Move Camera Up</button>
    <button onclick="moveCenterX(1)">Move Center Right</button>
    <button onclick="moveCenterX(-1)">Move Center Left</button>
    <button onclick="moveCenterY(1)">Move Center Up</button>
    <button onclick="moveCenterY(-1)">Move Center Down</button>
    <button onclick="moveCenterZ(1)">Move Center Forward</button>
    <button onclick="moveCenterZ(-1)">Move Center Backward</button>
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

    // OrbitControls untuk interaksi
    var controls = new THREE.OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true; // penghalusan gerakan
    controls.dampingFactor = 0.25;
    controls.screenSpacePanning = false;
    controls.minDistance = 1;
    controls.maxDistance = 1000;
    controls.maxPolarAngle = Math.PI / 2;

    // Membuat grup untuk semua objek
    var group = new THREE.Group();
    scene.add(group);

    // Mendefinisikan ukuran kubus
    var cubeSize = { length: 1, width: 1, height: 1 };
    var geometry = new THREE.BoxGeometry(cubeSize.length, cubeSize.width, cubeSize.height);

    // Memuat tekstur
    var textureLoader = new THREE.TextureLoader();
    var frontTexture = textureLoader.load('stasiun_bdg.jpg');

    // Buat array dari material untuk

    // setiap sisi kubus
    var material = [
        new THREE.MeshBasicMaterial({ color: 0x808080 }), // Sisi depan
        new THREE.MeshBasicMaterial({ color: 0x808080 }), // Sisi belakang
        new THREE.MeshBasicMaterial({ color: 0x808080 }), // Sisi atas
        new THREE.MeshBasicMaterial({ color: 0x808080 }), // Sisi bawah
        new THREE.MeshBasicMaterial({ color: 0x808080 }), // Sisi samping kanan
        new THREE.MeshBasicMaterial({ color: 0x808080 })  // Sisi samping kiri
    ];

    // Array dari titik-titik dan label
    var pointsWithLabels = [
        { position: new THREE.Vector3(-16, -16, 0), label: "Station A" },
        { position: new THREE.Vector3(-3, -12, 0), label: "Station B" },
        { position: new THREE.Vector3(4, 2, 0), label: "Station C" },
        { position: new THREE.Vector3(16, 16, 0), label: "Station D" }
    ];

    // Fungsi untuk membuat label teks
    function createTextLabel(message) {
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        context.font = 'Bold 60px Arial';
        context.fillStyle = 'rgba(0, 0, 255, 1.0)';
        context.fillText(message, 0, 60);

        var texture = new THREE.CanvasTexture(canvas);
        var spriteMaterial = new THREE.SpriteMaterial({ map: texture });
        var sprite = new THREE.Sprite(spriteMaterial);
        sprite.scale.set(2, 1, 1); // Sesuaikan skala teks
        return sprite;
    }

    // Membuat dan menempatkan kubus dan label untuk setiap titik
    pointsWithLabels.forEach(function(pointWithLabel) {
        var point = pointWithLabel.position;
        var label = pointWithLabel.label;

        // Membuat kubus
        var cube = new THREE.Mesh(geometry, material);
        cube.position.set(point.x, point.y, cubeSize.height / 2); // Set posisi kubus, dengan z disesuaikan agar kubus berada di atas ground
        group.add(cube);

        // Membuat label teks
        var textLabel = createTextLabel(label);
        textLabel.position.set(point.x + 1.5, point.y, cubeSize.height); // Set posisi label di samping kubus
        group.add(textLabel);
    });

    // Tambahkan grup ke scene
    scene.add(group);

    // Membuat balok di antara titik-titik
    var points = [
        new THREE.Vector3(-20, -20, 0),
        new THREE.Vector3(-4, -12, 0),
        new THREE.Vector3(0, 0, 0),
        new THREE.Vector3(12, 16, 0),
        new THREE.Vector3(20, 20, 0)
    ];

    var material = new THREE.MeshBasicMaterial({ color: 0x000000 });

    for (var i = 0; i < points.length - 1; i++) {
        var startPoint = points[i];
        var endPoint = points[i + 1];

        var direction = new THREE.Vector3().subVectors(endPoint, startPoint);
        var length = direction.length();

        var width = 0.2;  // Lebar balok
        var height = 0.1; // Tinggi balok
        var geometry = new THREE.BoxGeometry(length, width, height);

        var beam = new THREE.Mesh(geometry, material);

        var midPoint = new THREE.Vector3().addVectors(startPoint, endPoint).multiplyScalar(0.5);

        beam.position.copy(midPoint);

        var rotationAxis = new THREE.Vector3(0, 0, 1);  // Rotasi di sekitar sumbu Z
        var rotationAngle = Math.atan2(direction.y, direction.x);
        beam.setRotationFromAxisAngle(rotationAxis, rotationAngle);

        group.add(beam);
    }

    // Tambahkan plane dan grid
    var planeSize = 40;
    var planeGeometry = new THREE.PlaneGeometry(planeSize, planeSize);
    var planeMaterial = new THREE.MeshBasicMaterial({ color: 0xcccccc, side: THREE.DoubleSide });
    var plane = new THREE.Mesh(planeGeometry, planeMaterial);
    group.add(plane);

    var gridSize = planeSize;  // Ukuran grid
    var divisions = 4; // Jumlah divisi grid
    var gridHelper = new THREE.GridHelper(gridSize, divisions);
    gridHelper.rotation.x = Math.PI / 2;
    group.add(gridHelper);

    camera.position.z = 5;

    // Event listener untuk tombol
    document.getElementById("rotateX").addEventListener("click", function() {
        group.rotation.x += 0.1;
    });
    document.getElementById("rotateY").addEventListener("click", function() {
        group.rotation.y += 0.1;
    });
    document.getElementById("rotateZ").addEventListener("click", function() {
        group.rotation.z += 0.1;
    });
    document.getElementById("zoomIn").addEventListener("click", function() {
        camera.position.z -= 1;
    });
    document.getElementById("zoomOut").addEventListener("click", function() {
        camera.position.z += 1;
    });

    // Fungsi animate untuk merender scene
    function animate() {
        requestAnimationFrame(animate);
        controls.update(); // Update OrbitControls
        renderer.render(scene, camera);
    }

    animate();
  </script>
