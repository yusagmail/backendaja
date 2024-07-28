<?php
\yii\web\YiiAsset::register($this);
$this->registerJsFile('@web/js/jstree/three.min.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js', ['position' => \yii\web\View::POS_HEAD]);

// Simulasi data JSON (diganti dengan cara sesuai framework Anda)
$jsonData = '[
  {"name": "Living Room", "start_x": -2.5, "start_y": 2.5, "length": 2, "width": 2},
  {"name": "Corridor", "start_x": -2.5, "start_y": 0, "length": 2, "width": 1},
  {"name": "Kitchen", "start_x": -4, "start_y": 1, "length": 2, "width": 1},
  {"name": "Bedroom", "start_x": -1.5, "start_y": 2, "length": 2, "width": 3},
  {"name": "Bedroom", "start_x": 1.5, "start_y": 2, "length": 2, "width": 3}
]';
?>
<script>
// Definisikan variabel scene di luar dari tag <script>
const scene = new THREE.Scene();

// Definisikan fungsi createWall di luar dari tag <script>
function createWall(width, height, depth, x, y, z, rotationY = 0) {
  const wallMaterial = new THREE.MeshBasicMaterial({ color: 0x808080 });
  const wallGeometry = new THREE.BoxGeometry(width, height, depth);
  const wall = new THREE.Mesh(wallGeometry, wallMaterial);
  wall.position.set(x, y, z);
  wall.rotation.y = rotationY;
  scene.add(wall); // Tambahkan dinding ke dalam scene
}

function getData() {
  // Simulasi pengambilan data JSON (diganti dengan cara sesuai framework Anda)
  console.log("Test Load");
  const jsonData = <?php echo json_encode($jsonData); ?>;
  console.log(jsonData);
  loadRoomsFromJson(jsonData);
}

function loadRoomsFromJson(data) {
  const roomsData = JSON.parse(data);

  roomsData.forEach(roomData => {
    createRoom(roomData);
    console.log(roomData);
  });
}

function createRoom(roomData) {
  const { start_x, start_y, length, width, name } = roomData;
  const roomGeometry = new THREE.BoxGeometry(length, 2, width);
  const roomMaterial = new THREE.MeshBasicMaterial({ color: Math.random() * 0xffffff });
  const room = new THREE.Mesh(roomGeometry, roomMaterial);

  // Position the room based on start_x and start_y
  room.position.set(start_x + length / 2, 1, start_y + width / 2);

  // Call createWall function to create walls for each room
  createWall(length, 2, 0.2, start_x + length / 2, 1, start_y); // back wall
  createWall(length, 2, 0.2, start_x + length / 2, 1, start_y + width); // front wall
  createWall(0.2, 2, width, start_x, 1, start_y + width / 2); // left wall
  createWall(0.2, 2, width, start_x + length, 1, start_y + width / 2); // right wall

  // Output room name to console
  console.log(name);

  // Add the room to the scene
  scene.add(room);
}
</script>
<button onclick="getData()">Load Rooms</button>
<div id="denahContainer"></div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
  const renderer = new THREE.WebGLRenderer();
  renderer.setSize(window.innerWidth, window.innerHeight);
  document.getElementById('denahContainer').appendChild(renderer.domElement);

  // Create floor
  const floorGeometry = new THREE.PlaneGeometry(15, 15);
  const floorMaterial = new THREE.MeshBasicMaterial({ color: 0xeeeeee, side: THREE.DoubleSide });
  const floor = new THREE.Mesh(floorGeometry, floorMaterial);
  floor.rotation.x = Math.PI / 2; // Rotate floor to be horizontal
  scene.add(floor);

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
