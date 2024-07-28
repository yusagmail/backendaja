<?php
\yii\web\YiiAsset::register($this);
$this->registerJsFile('@web/js/jstree/three.min.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js', ['position' => \yii\web\View::POS_HEAD]);
?>
<button>
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