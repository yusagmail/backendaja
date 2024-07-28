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
  <script>
    // Inisialisasi scene, kamera, dan renderer
    var scene = new THREE.Scene();
    var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    var renderer = new THREE.WebGLRenderer();
    renderer.setSize(window.innerWidth, window.innerHeight);
    var container = document.getElementById('myCanvasContainer');
    container.appendChild(renderer.domElement);

    // Membuat grup untuk semua objek
    var group = new THREE.Group();
    scene.add(group);

    // Membuat kubus dengan ukuran yang diminta
    var cubeSize = { length: 1, width: 1, height: 1 };
    var geometry = new THREE.BoxGeometry(cubeSize.length, cubeSize.width, cubeSize.height);
    var textureLoader = new THREE.TextureLoader();
    var frontTexture = textureLoader.load('stasiun_bdg.jpg');
    
    // Buat array dari materi untuk setiap sisi kubus
    var material = [
      new THREE.MeshBasicMaterial({ color: 0x808080 }), // Sisi depan
      new THREE.MeshBasicMaterial({ color: 0x808080 }),    // Sisi atas
      new THREE.MeshBasicMaterial({ color: 0x808080 }),   // Sisi samping kanan
      new THREE.MeshBasicMaterial({ color: 0x808080 }),    // Sisi belakang
      new THREE.MeshBasicMaterial({ color: 0x808080 }),    // Sisi bawah
      new THREE.MeshBasicMaterial({ color: 0x808080 })     // Sisi samping kiri
    ];
    var cube = new THREE.Mesh(geometry, material);
    cube.position.set(1.5, 0, cubeSize.height/2);
    //group.add(cube);



// Mendefinisikan ukuran kubus
var cubeSize = { length: 1, width: 1, height: 1 };
var geometry = new THREE.BoxGeometry(cubeSize.length, cubeSize.width, cubeSize.height);

// Memuat tekstur
var textureLoader = new THREE.TextureLoader();
var frontTexture = textureLoader.load('stasiun_bdg.jpg');

// Buat array dari material untuk setiap sisi kubus
var material = [
    new THREE.MeshBasicMaterial({ color: 0x808080 }), // Sisi depan
    new THREE.MeshBasicMaterial({ color: 0x808080 }), // Sisi belakang
    new THREE.MeshBasicMaterial({ color: 0x808080 }), // Sisi atas
    new THREE.MeshBasicMaterial({ color: 0x808080 }), // Sisi bawah
    new THREE.MeshBasicMaterial({ color: 0x808080 }), // Sisi samping kanan
    new THREE.MeshBasicMaterial({ color: 0x808080 })  // Sisi samping kiri
];

// Array dari titik-titik
var points = [
    new THREE.Vector3(-20, 2, 0),
    new THREE.Vector3(4, 2, 0),
    new THREE.Vector3(10, 4, 0),
    new THREE.Vector3(20, 4, 0)
];

// Membuat dan menempatkan kubus untuk setiap titik
points.forEach(function(point) {
    var cube = new THREE.Mesh(geometry, material);
    cube.position.set(point.x, point.y, cubeSize.height / 2); // Set posisi kubus, dengan z disesuaikan agar kubus berada di atas ground
    //group.add(cube);
});

// Tambahkan grup ke scene
//scene.add(group);






// Mendefinisikan ukuran kubus
var cubeSize = { length: 1, width: 1, height: 1 };
var geometry = new THREE.BoxGeometry(cubeSize.length, cubeSize.width, cubeSize.height);

// Memuat tekstur
var textureLoader = new THREE.TextureLoader();
var frontTexture = textureLoader.load('stasiun_bdg.jpg');

// Buat array dari material untuk setiap sisi kubus
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




    //group.add(cube);



    //Menambahkan kotak
    // Titik sudut kiri atas dan kanan atas
    // Titik awal dan akhir
    var startPoint = new THREE.Vector3(-1, -1, 0);
    var endPoint = new THREE.Vector3(1, 1, 0);

    // Hitung vektor arah dan panjangnya
    var direction = new THREE.Vector3().subVectors(endPoint, startPoint);
    var length = direction.length();

    // Buat geometri balok
    var width = 0.4;  // Lebar balok
    var height = 0.4; // Tinggi balok
    var geometry = new THREE.BoxGeometry(length, width, height);

    // Buat material balok
    var material = new THREE.MeshBasicMaterial({ color: 0xff0000 });

    // Buat mesh balok
    var beam = new THREE.Mesh(geometry, material);

    // Hitung titik tengah antara startPoint dan endPoint
    var midPoint = new THREE.Vector3().addVectors(startPoint, endPoint).multiplyScalar(0.5);

    // Set posisi balok ke titik tengah
    beam.position.copy(midPoint);

    // Set rotasi balok agar sejajar dengan garis startPoint-endPoint
    var rotationAxis = new THREE.Vector3(0, 0, 1);  // Rotasi di sekitar sumbu Z
    var rotationAngle = Math.atan2(direction.y, direction.x);
    beam.setRotationFromAxisAngle(rotationAxis, rotationAngle);

    // Tambahkan balok ke scene
    group.add(beam);


    // Array dari titik-titik
var points = [
    new THREE.Vector3(-20, -20, 0),
    new THREE.Vector3(-4, -12, 0),
    new THREE.Vector3(0, 0, 0),
    new THREE.Vector3(12, 16, 0),
    new THREE.Vector3(20, 20, 0)
];

//Fungsi Sinuns
/*
var points = [];
var step = (28 / 19); // Interval x untuk 20 titik dari -14 hingga 14
for (var i = 0; i < 20; i++) {
    var x = -14 + i * step;
    var y = 5 * Math.sin(x / 2); // Menggunakan fungsi sinus untuk variasi y
    var z = 0;
    points.push(new THREE.Vector3(x, y, z));
}

//S Curve
// Fungsi untuk membuat kurva S
function sCurve(t) {
    var x = -20 + t * 40;
    var y = 20 * (2 / (1 + Math.exp(-t)) - 1); // Fungsi sigmoid untuk membuat kurva S
    return new THREE.Vector3(x, y, 0);
}

// Array dari titik-titik
var points = [];
var segments = 20; // Jumlah segmen untuk kurva S
for (var i = 0; i <= segments; i++) {
    var t = i / segments;
    points.push(sCurve(t));
}
*/

// Buat material balok
var material = new THREE.MeshBasicMaterial({ color: 0x000000 });

for (var i = 0; i < points.length - 1; i++) {
    var startPoint = points[i];
    var endPoint = points[i + 1];

    // Hitung vektor arah dan panjangnya
    var direction = new THREE.Vector3().subVectors(endPoint, startPoint);
    var length = direction.length();

    // Buat geometri balok
    var width = 0.2;  // Lebar balok
    var height = 0.1; // Tinggi balok
    var geometry = new THREE.BoxGeometry(length, width, height);

    // Buat mesh balok
    var beam = new THREE.Mesh(geometry, material);

    // Hitung titik tengah antara startPoint dan endPoint
    var midPoint = new THREE.Vector3().addVectors(startPoint, endPoint).multiplyScalar(0.5);

    // Set posisi balok ke titik tengah
    beam.position.copy(midPoint);

    // Set rotasi balok agar sejajar dengan garis startPoint-endPoint
    var rotationAxis = new THREE.Vector3(0, 0, 1);  // Rotasi di sekitar sumbu Z
    var rotationAngle = Math.atan2(direction.y, direction.x);
    beam.setRotationFromAxisAngle(rotationAxis, rotationAngle);

    // Tambahkan balok ke scene
    group.add(beam);
}

// Jangan lupa tambahkan group ke scene utama jika belum dilakukan
scene.add(group);


    // Menambahkan Plane yang berfungsi sebagai referensi grid
    var planeSize = 40;
    var planeGeometry = new THREE.PlaneGeometry(planeSize, planeSize);
    var planeMaterial = new THREE.MeshBasicMaterial({ color: 0xcccccc, side: THREE.DoubleSide });
    var plane = new THREE.Mesh(planeGeometry, planeMaterial);
    //plane.rotation.x = -Math.PI / 2; // Rotasi agar sejajar dengan sumbu XZ
    //plane.rotation.set(Math.PI / 2, 0, 0); //Sejajar sumbu XY
    group.add(plane);

    // Menambahkan Grid Helper
    var gridSize = planeSize;  // Ukuran grid
    var divisions = 4; // Jumlah divisi grid
    var gridHelper = new THREE.GridHelper(gridSize, divisions);
    gridHelper.rotation.x = Math.PI / 2; 
    group.add(gridHelper);




    //Kubus kedua
    // Membuat kubus dengan ukuran yang diminta
    var cubeSize = { length: 4, width: 2, height: 2 };
    var geometry = new THREE.BoxGeometry(cubeSize.length, cubeSize.width, cubeSize.height);
    var textureLoader = new THREE.TextureLoader();
    var frontTexture = textureLoader.load('stasiun_bdg.jpg');
    var topTexture = textureLoader.load('link_gambar_atas.jpg');
    var sideTexture = textureLoader.load('link_gambar_samping.jpg');
    
    // Buat array dari materi untuk setiap sisi kubus
    var material = [
      new THREE.MeshBasicMaterial({ map: frontTexture }), // Sisi depan
      new THREE.MeshBasicMaterial({ map: topTexture }),    // Sisi atas
      new THREE.MeshBasicMaterial({ map: sideTexture }),   // Sisi samping kanan
      new THREE.MeshBasicMaterial({ map: frontTexture }),    // Sisi belakang
      new THREE.MeshBasicMaterial({ color: 0x00ff00 }),    // Sisi bawah
      new THREE.MeshBasicMaterial({ color: 0xff0000 })     // Sisi samping kiri
    ];
    var cube = new THREE.Mesh(geometry, material);
    cube.position.set(15, 15, 0+1);
    //group.add(cube);

    camera.position.z = 5;

    // Variabel untuk rotasi
    var rotationSpeed = 0.01; // Kecepatan rotasi bisa disesuaikan

    // Fungsi untuk rotasi
    function rotateX() {
      group.rotation.x += rotationSpeed;
    }

    function rotateY() {
      group.rotation.y += rotationSpeed;
    }

    function rotateZ() {
      group.rotation.z += rotationSpeed;
    }

    // Fungsi untuk zoom in dan zoom out
    function zoomIn() {
      camera.position.z -= 1;
    }

    function zoomOut() {
      camera.position.z += 1;
    }

    // Fungsi untuk memindahkan kamera ke atas
    function moveCameraUp() {
      camera.position.y += 1;
    }

    // Fungsi untuk menggerakkan pusat tampilan (center of display) pada sumbu X
    function moveCenterX(amount) {
      group.position.x += amount;
    }

    // Fungsi untuk menggerakkan pusat tampilan (center of display) pada sumbu Y
    function moveCenterY(amount) {
      group.position.y += amount;
    }

    // Fungsi untuk menggerakkan pusat tampilan (center of display) pada sumbu Z
    function moveCenterZ(amount) {
      group.position.z += amount;
    }

    // Event listener untuk tombol
    document.getElementById("rotateX").addEventListener("click", rotateX);
    document.getElementById("rotateY").addEventListener("click", rotateY);
    document.getElementById("rotateZ").addEventListener("click", rotateZ);
    document.getElementById("zoomIn").addEventListener("click", zoomIn);
    document.getElementById("zoomOut").addEventListener("click", zoomOut);

    // Fungsi animate untuk merender scene
    function animate() {
      requestAnimationFrame(animate);
      TWEEN.update();
      renderer.render(scene, camera);
    }

// Variabel untuk rotasi dengan mouse
    let isMouseDown = false;
    let previousMousePosition = {
      x: 0,
      y: 0
    };

    // Event listener untuk mouse down
    renderer.domElement.addEventListener('mousedown', function(event) {
      isMouseDown = true;
    });

    // Event listener untuk mouse up
    renderer.domElement.addEventListener('mouseup', function(event) {
      isMouseDown = false;
    });

    // Event listener untuk mouse move
    renderer.domElement.addEventListener('mousemove', function(event) {
      if (isMouseDown) {
        let deltaMove = {
          x: event.offsetX - previousMousePosition.x,
          y: event.offsetY - previousMousePosition.y
        };

        let deltaRotationQuaternion = new THREE.Quaternion()
          .setFromEuler(new THREE.Euler(
            toRadians(deltaMove.y * 1),
            toRadians(deltaMove.x * 1),
            0,
            'XYZ'
          ));

        group.quaternion.multiplyQuaternions(deltaRotationQuaternion, group.quaternion);
      }

      previousMousePosition = {
        x: event.offsetX,
        y: event.offsetY
      };
    });

    // Event listener untuk mouse wheel
    renderer.domElement.addEventListener('wheel', function(event) {
      if (event.deltaY < 0) {
        camera.position.z -= 1; // Zoom in
      } else {
        camera.position.z += 1; // Zoom out
      }
    });

    // Fungsi untuk mengubah derajat menjadi radian
    function toRadians(angle) {
      return angle * (Math.PI / 180);
    }

    animate();
  </script>

