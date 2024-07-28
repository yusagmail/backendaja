<?php
\yii\web\YiiAsset::register($this);
$this->registerJsFile('@web/js/jstree/three.min.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js', ['position' => \yii\web\View::POS_HEAD]);

// Simulasi data JSON (diganti dengan cara sesuai framework Anda)
$jsonData = '[
  {"name": "Living Room", "start_x": -2.5, "start_y": 2.5, "length": 5, "width": 5},
  {"name": "Corridor", "start_x": -2.5, "start_y": 0, "length": 5, "width": 0.2},
  {"name": "Kitchen", "start_x": -4, "start_y": 1, "length": 3, "width": 0.2},
  {"name": "Bedroom", "start_x": -1.5, "start_y": 2, "length": 0.2, "width": 3},
  {"name": "Bedroom", "start_x": 1.5, "start_y": 2, "length": 0.2, "width": 3}
]';
?>
<script>
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
    createWall(15, 2, 0.2, 0, 1, -7.5);
    console.log(name);
  }
</script>
<button onclick="getData()">Load Rooms</button>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const scene = new THREE.Scene();
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
  /*
  createWall(15, 2, 0.2, 0, 1, -7.5);  // back wall
  createWall(15, 2, 0.2, 0, 1, 7.5);   // front wall
  createWall(0.2, 2, 15, -7.5, 1, 0);  // left wall
  createWall(0.2, 2, 15, 7.5, 1, 0);   // right wall

  // Inner walls
  createWall(0.2, 2, 5, -2.5, 1, 2.5);  // living room wall
  createWall(0.2, 2, 5, 2.5, 1, 2.5);   // living room wall
  createWall(5, 2, 0.2, 0, 1, 0);       // corridor wall
  createWall(0.2, 2, 3, -4, 1, 1);      // kitchen wall
  createWall(0.2, 2, 3, 4, 1, 1);       // kitchen wall
  createWall(3, 2, 0.2, -1, 1, 2);      // bedroom wall
  createWall(3, 2, 0.2, 1, 1, 2);       // bedroom wall
  */

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
