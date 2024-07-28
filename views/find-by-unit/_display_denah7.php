<?php
\yii\web\YiiAsset::register($this);
$this->registerJsFile('@web/js/jstree/three.min.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js', ['position' => \yii\web\View::POS_HEAD]);

// Simulasi data JSON (diganti dengan cara sesuai framework Anda)
$jsonData = '[
  {"name": "Living Room", "start_x": -2.5, "start_y": 2.5, "length": 2, "width": 2, "contents": ["Sofa", "TV"]},
  {"name": "Corridor", "start_x": -2.5, "start_y": 0, "length": 2, "width": 1, "contents": ["Hallway Table"]},
  {"name": "Kitchen", "start_x": -4, "start_y": 1, "length": 2, "width": 1, "contents": ["Sink", "Stove"]},
  {"name": "Bedroom", "start_x": -1.5, "start_y": 2, "length": 2, "width": 3, "contents": ["Bed", "Wardrobe"]},
  {"name": "Bedroom", "start_x": 1.5, "start_y": 2, "length": 2, "width": 3, "contents": ["Desk", "Chair"]}
]';
?>
<script>
const scene = new THREE.Scene();
const clickableCubes = []; // Array untuk menyimpan kubus klikable

function createWall(width, height, depth, x, y, z, rotationY = 0) {
  const wallMaterial = new THREE.MeshBasicMaterial({ color: 0x808080 });
  const wallGeometry = new THREE.BoxGeometry(width, height, depth);
  const wall = new THREE.Mesh(wallGeometry, wallMaterial);
  wall.position.set(x, y, z);
  wall.rotation.y = rotationY;
  scene.add(wall);
}

function getData() {
  const jsonData = <?php echo json_encode($jsonData); ?>;
  loadRoomsFromJson(jsonData);
}

function loadRoomsFromJson(data) {
  const roomsData = JSON.parse(data);

  roomsData.forEach(roomData => {
    createRoom(roomData);
  });
}

function createRoom(roomData) {
  const { start_x, start_y, length, width, name, contents } = roomData;
  const roomGeometry = new THREE.BoxGeometry(length, 2, width);
 
const roomMaterial = new THREE.MeshBasicMaterial({ color: Math.random() * 0xffffff });

  const room = new THREE.Mesh(roomGeometry, roomMaterial);
  room.position.set(start_x + length / 2, 1, start_y + width / 2);

  // Create text label for room name
  const loader = new THREE.FontLoader();
  loader.load('https://threejs.org/examples/fonts/helvetiker_regular.typeface.json', function (font) {
    const textGeometry = new THREE.TextGeometry(name, {
      font: font,
      size: 0.3,
      height: 0.05,
    });
    const textMaterial = new THREE.MeshBasicMaterial({ color: 0xffffff });
    const text = new THREE.Mesh(textGeometry, textMaterial);
    text.position.set(start_x + length / 2 - 0.5, 2, start_y + width / 2);
    scene.add(text);
  });

  // Create walls for the room
  createWall(length, 0.2, width, start_x + length / 2, 0.1, start_y + width / 2); // No ceiling

  // Create clickable cubes for room contents
  contents.forEach((item, index) => {
    const cubeGeometry = new THREE.BoxGeometry(0.3, 0.3, 0.3);
    const cubeMaterial = new THREE.MeshBasicMaterial({ color: Math.random() * 0xffffff });
    const cube = new THREE.Mesh(cubeGeometry, cubeMaterial);
    cube.position.set(start_x + 0.5 + index * 0.5, 0.3, start_y + 0.5);
    scene.add(cube);
    
    // Add cube to clickableCubes array for interaction
    clickableCubes.push({ cube: cube, roomName: name, itemName: item });

    // Add click event listener to each cube
    cube.addEventListener('click', function () {
      alert(`You clicked on ${item} in the ${name}`);
    });
  });

  // Add room to the scene
  scene.add(room);
}

// Initialize Three.js components
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

  // Set camera position and rotation
  camera.position.z = 20;
  camera.position.y = 10;
  camera.rotation.x = -0.5;

  // Add orbit controls for interaction
  const controls = new THREE.OrbitControls(camera, renderer.domElement);
  controls.enableZoom = true;
  controls.enablePan = true;

  // Animation loop
  const animate = function () {
    requestAnimationFrame(animate);
    controls.update();
    renderer.render(scene, camera);
  };

  animate(); // Start animation loop
});
</script>

<button onclick="getData()">Load Rooms</button>
<div id="denahContainer"></div>
