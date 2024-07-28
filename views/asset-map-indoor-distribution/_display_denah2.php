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

<button id="loadRoomsButton">Load Rooms</button>
<div id="denahContainer"></div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const scene = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
  const renderer = new THREE.WebGLRenderer();
  renderer.setSize(window.innerWidth, window.innerHeight);
  document.getElementById('denahContainer').appendChild(renderer.domElement);

  function createRoom(roomData) {
    const { start_x, start_y, length, width, name } = roomData;

    const roomGeometry = new THREE.BoxGeometry(length, 2, width);
    const roomMaterial = new THREE.MeshBasicMaterial({ color: Math.random() * 0xffffff });
    const room = new THREE.Mesh(roomGeometry, roomMaterial);
    
    // Position the room based on start_x and start_y
    room.position.set(start_x + length / 2, 1, start_y + width / 2);

    scene.add(room);
  }

  // Function to load rooms from JSON data
  function loadRoomsFromJson(data) {
    const roomsData = JSON.parse(data);

    roomsData.forEach(roomData => {
      createRoom(roomData);
    });

    // Automatically adjust camera position to fit all rooms
    const box = new THREE.Box3().setFromObject(scene);
    const center = box.getCenter(new THREE.Vector3());
    const size = box.getSize(new THREE.Vector3());

    const maxDim = Math.max(size.x, size.y, size.z);
    const fov = camera.fov * (Math.PI / 180);
    let cameraZ = Math.abs(maxDim / 4 * Math.tan(fov * 2));

    camera.position.set(center.x, center.y + size.y, center.z + maxDim);
    camera.lookAt(center);
    
    const controls = new THREE.OrbitControls(camera, renderer.domElement);
    controls.enableZoom = true;
    controls.enablePan = true;

    function animate() {
      requestAnimationFrame(animate);
      controls.update();
      renderer.render(scene, camera);
    }

    animate();
  }

  document.getElementById('loadRoomsButton').addEventListener('click', function() {
    // Simulasi pengambilan data JSON (diganti dengan cara sesuai framework Anda)
    const jsonData = '<?php echo addslashes($jsonData); ?>';
    loadRoomsFromJson(jsonData);
  });

  // Create floor (as per your original code)
  const floorGeometry = new THREE.PlaneGeometry(15, 15);
  const floorMaterial = new THREE.MeshBasicMaterial({ color: 0xeeeeee, side: THREE.DoubleSide });
  const floor = new THREE.Mesh(floorGeometry, floorMaterial);
  floor.rotation.x = Math.PI / 2; // Rotate floor to be horizontal
  scene.add(floor);
});
</script>
