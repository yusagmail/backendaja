<?php
\yii\web\YiiAsset::register($this);
$this->registerJsFile('@web/js/jstree/three.min.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js', ['position' => \yii\web\View::POS_HEAD]);

// Simulasi data JSON (diganti dengan cara sesuai framework Anda)
$jsonData = '[
  {"name": "Living Room", "start_x": -5.5, "start_y": 2.5, "length": 2, "width": 2, "contents": ["Sofa", "TV"]},
  {"name": "Corridor", "start_x": -2.5, "start_y": 0, "length": 2, "width": 1, "contents": ["Hallway Table"]},
  {"name": "Kitchen", "start_x": -4, "start_y": 1, "length": 2, "width": 1, "contents": ["Sink", "Stove"]},
  {"name": "Bedroom", "start_x": -1.5, "start_y": 2, "length": 2, "width": 3, "contents": ["Bed", "Wardrobe"]},
  {"name": "Bedroom", "start_x": 1.5, "start_y": 2, "length": 2, "width": 3, "contents": ["Desk", "Chair"]}
]';
?>
<script>
const scene = new THREE.Scene();
const clickableCubes = []; // Array untuk menyimpan kubus klikable
const WALL_HEIGHT = 0.5; // Konstanta untuk tinggi tembok

function createWall(width, height, depth, x, y, z, rotationY = 0) {
  const wallMaterial = new THREE.MeshBasicMaterial({ color: 0x808080 });
  const wallGeometry = new THREE.BoxGeometry(width, height, depth);
  const wall = new THREE.Mesh(wallGeometry, wallMaterial);
  wall.position.set(x, y, z);
  wall.rotation.y = rotationY;
  scene.add(wall);

  // Create edges for the wall
  const edges = new THREE.EdgesGeometry(wallGeometry);
  const line = new THREE.LineSegments(edges, new THREE.LineBasicMaterial({ color: 0x000000 }));
  line.position.set(x, y, z);
  line.rotation.y = rotationY;
  scene.add(line);
}

function createRoom(roomData) {
  const { start_x, start_y, length, width, name, contents } = roomData;

  if (start_x !== undefined && start_y !== undefined && length !== undefined && width !== undefined && name !== undefined && contents !== undefined) {
    // Create walls for the room
    createWall(length, WALL_HEIGHT, 0.1, start_x + length / 2, WALL_HEIGHT / 2, start_y); // Back wall
    createWall(length, WALL_HEIGHT, 0.1, start_x + length / 2, WALL_HEIGHT / 2, start_y + width); // Front wall
    createWall(0.1, WALL_HEIGHT, width, start_x, WALL_HEIGHT / 2, start_y + width / 2); // Left wall
    createWall(0.1, WALL_HEIGHT, width, start_x + length, WALL_HEIGHT / 2, start_y + width / 2); // Right wall

    // Create text label for room name
    const loader = new THREE.FontLoader();
    loader.load('https://threejs.org/examples/fonts/helvetiker_regular.typeface.json', function (font) {
      const textGeometry = new THREE.TextGeometry(name, {
        font: font,
        size: 0.2,
        height: 0.05,
      });
      const textMaterial = new THREE.MeshBasicMaterial({ color: 0x000000 });
      const text = new THREE.Mesh(textGeometry, textMaterial);
      text.position.set(start_x + length / 2 - 0.5, WALL_HEIGHT + 0.1, start_y + width / 2);
      scene.add(text);
    }, undefined, function (error) {
      console.error('Font loading error:', error);
    });

    // Create clickable cubes for room contents
    contents.forEach((item, index) => {
      const cubeGeometry = new THREE.BoxGeometry(0.3, 0.3, 0.3);
      const cubeMaterial = new THREE.MeshBasicMaterial({ color: Math.random() * 0xffffff });
      const cube = new THREE.Mesh(cubeGeometry, cubeMaterial);
      cube.position.set(start_x + 0.5 + index * 0.5, 0.3, start_y + 0.5);
      scene.add(cube);

      // Add cube to clickableCubes array for interaction
      clickableCubes.push({ cube: cube, roomName: name, itemName: item });
    });
  } else {
    console.error('Invalid room data:', roomData);
  }
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

  // Raycaster and mouse vector
  const raycaster = new THREE.Raycaster();
  const mouse = new THREE.Vector2();

  // Mouse click event
  function onMouseClick(event) {
    // Calculate mouse position in normalized device coordinates (-1 to +1) for both components
    mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
    mouse.y = - (event.clientY / window.innerHeight) * 2 + 1;

    // Update the picking ray with the camera and mouse position
    raycaster.setFromCamera(mouse, camera);

    // Calculate objects intersecting the picking ray
    const intersects = raycaster.intersectObjects(clickableCubes.map(c => c.cube));

    if (intersects.length > 0) {
      const clickedCube = intersects[0].object;
      const clickedItem = clickableCubes.find(c => c.cube === clickedCube);
      if (clickedItem) {
        alert(`You clicked on ${clickedItem.itemName} in the ${clickedItem.roomName}`);
      }
    }
  }

  // Mouse move event
  function onMouseMove(event) {
    // Calculate mouse position in normalized device coordinates (-1 to +1) for both components
    mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
    mouse.y = - (event.clientY / window.innerHeight) * 2 + 1;

    // Update the picking ray with the camera and mouse position
    raycaster.setFromCamera(mouse, camera);

    // Calculate objects intersecting the picking ray
    const intersects = raycaster.intersectObjects(clickableCubes.map(c => c.cube));

    if (intersects.length > 0) {
      document.body.style.cursor = 'pointer';
    } else {
      document.body.style.cursor = 'default';
    }
  }

  window.addEventListener('click', onMouseClick, false);
  window.addEventListener('mousemove', onMouseMove, false);

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
