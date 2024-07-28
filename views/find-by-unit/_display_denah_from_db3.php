<?php
\yii\web\YiiAsset::register($this);
$this->registerJsFile('@web/js/jstree/three.min.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js', ['position' => \yii\web\View::POS_HEAD]);

?>
<script>
  const scene = new THREE.Scene();
  const clickableCubes = []; // Array untuk menyimpan kubus klikable
  const WALL_HEIGHT = 0.5; // Konstanta untuk tinggi tembok

  function createWall(width, height, depth, x, y, z, rotationY = 0) {
    const wallMaterial = new THREE.MeshBasicMaterial({
      color: 0x808080
    });
    const wallGeometry = new THREE.BoxGeometry(width, height, depth);
    const wall = new THREE.Mesh(wallGeometry, wallMaterial);
    wall.position.set(x, y, z);
    wall.rotation.y = rotationY;
    scene.add(wall);

    // Create edges for the wall
    const edges = new THREE.EdgesGeometry(wallGeometry);
    const line = new THREE.LineSegments(edges, new THREE.LineBasicMaterial({
      color: 0x000000
    }));
    line.position.set(x, y, z);
    line.rotation.y = rotationY;
    scene.add(line);
  }

  var longest_x = 0;
  var longest_y = 0;

  function createRoom(roomData) {
    const start_x = roomData.start_x;
    const start_y = roomData.start_y;
    const length = roomData.length;
    const width = roomData.width;
    const name = roomData.name;
    const contents = roomData.contents;
    const assets = roomData.assets;

    if (start_x !== undefined && start_y !== undefined && length !== undefined && width !== undefined && name !== undefined) {
      // Create walls for the room
      createWall(length, WALL_HEIGHT, 0.1, start_x + length / 2, WALL_HEIGHT / 2, start_y); // Back wall
      createWall(length, WALL_HEIGHT, 0.1, start_x + length / 2, WALL_HEIGHT / 2, start_y + width); // Front wall
      createWall(0.1, WALL_HEIGHT, width, start_x, WALL_HEIGHT / 2, start_y + width / 2); // Left wall
      createWall(0.1, WALL_HEIGHT, width, start_x + length, WALL_HEIGHT / 2, start_y + width / 2); // Right wall

      if ((start_x + length) > longest_x) {
        longest_x = start_x + length;
      }
      if ((start_y + width) > longest_y) {
        longest_y = start_y + length;
      }

      // Create sprite for room name
      createTextSprite(name, start_x + length / 2 - 0.5, WALL_HEIGHT + 0.3, start_y + width / 2, 0.5);

      // Create clickable cubes for room contents
      if (Array.isArray(assets)) {
        assets.forEach(function(asset) {
          const cubeGeometry = new THREE.BoxGeometry(0.2, 0.2, 0.2);
          const cubeMaterial = new THREE.MeshBasicMaterial({
            color: Math.random() * 0xffffff
          });
          const cube = new THREE.Mesh(cubeGeometry, cubeMaterial);

          // Random position within the room
          const randomX = start_x + Math.random() * length;
          const randomY = WALL_HEIGHT + 0.1;
          const randomZ = start_y + Math.random() * width;

          cube.position.set(randomX, randomY, randomZ);
          scene.add(cube);

          // Add cube to clickableCubes array
          clickableCubes.push({
            cube: cube,
            itemName: asset.keterangan,
            roomName: name
          });

          // Create sprite for each asset
          createTextSprite(asset.keterangan, randomX, randomY + 0.3, randomZ, 0.3);
        });
      }

    } else {
      console.error('Invalid room data:', roomData);
    }
  }

  function createTextSprite(text, x, y, z, scale) {
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');
    const fontSize = 500; // Increased font size for larger text
    context.font = `Bold ${fontSize}px Arial`; 
    context.fillStyle = 'rgba(0, 0, 0, 1.0)'; // Ensure text is black

    // Measure text width and set canvas dimensions accordingly
    const textWidth = context.measureText(text).width;
    canvas.width = textWidth;
    canvas.height = fontSize;

    // Draw the text
    context.font = `Bold ${fontSize}px Arial`;
    context.fillStyle = 'rgba(0, 0, 0, 1.0)';
    context.fillText(text, 0, fontSize);

    const texture = new THREE.Texture(canvas);
    texture.needsUpdate = true;

    const spriteMaterial = new THREE.SpriteMaterial({ map: texture });
    const sprite = new THREE.Sprite(spriteMaterial);
    sprite.scale.set(scale, scale * (canvas.height / canvas.width), scale); // Adjust scale based on the provided scale value
    sprite.position.set(x, y, z);
    scene.add(sprite);
  }

  function loadRoomsFromJson(data) {
    // Clear the scene before rendering new data
    while(scene.children.length > 0){ 
      scene.remove(scene.children[0]); 
    }

    const roomsData = JSON.parse(data);
    roomsData.forEach(roomData => {
      createRoom(roomData);
    });

    // Create floor
    var length = 5;
    var width = 5;
    if (longest_x > 5) {
      length = longest_x;
    }
    if (longest_y > 5) {
      width = longest_y;
    }
    const floorGeometry = new THREE.PlaneGeometry(length * 2, width * 2);
    const floorMaterial = new THREE.MeshBasicMaterial({
      color: 0x00ff00,
      side: THREE.DoubleSide
    });
    const floor = new THREE.Mesh(floorGeometry, floorMaterial);
    floor.rotation.x = Math.PI / 2; // Rotate floor to be horizontal
    scene.add(floor);
  }

  // Initialize Three.js components
  document.addEventListener('DOMContentLoaded', function() {
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer();
    renderer.setSize(window.innerWidth, window.innerHeight);
    document.getElementById('denahContainer3D').appendChild(renderer.domElement);

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
      mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;

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
      mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;

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
    const animate = function() {
      requestAnimationFrame(animate);
      controls.update();
      renderer.render(scene, camera);
    };

    animate(); // Start animation loop
  });

</script>

<div id="denahContainer3D" style="display: none;"></div>
