
<body>
  <div id="denahsimpleContainer"></div>
  <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/build/three.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tween.js/17.3.2/Tween.min.js"></script>

  <script>
    let scene2, camera, renderer, controls;
    let clickableObjects = [];
    let hoverTween = null;
    let distanceLine = null;

    init();
    animate();

    function init() {
      // Scene
      scene2 = new THREE.Scene();

      // Camera
      camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
      camera.position.z = 3;

      // Renderer
      renderer = new THREE.WebGLRenderer();
      renderer.setSize(window.innerWidth, window.innerHeight);
      document.getElementById('denahsimpleContainer').appendChild(renderer.domElement);

      // Controls
      controls = new THREE.OrbitControls(camera, renderer.domElement);

      // Box Geometry
      const geometry = new THREE.BoxGeometry();
      const material = new THREE.MeshBasicMaterial({ color: 0x00ff00 });
      const cube = new THREE.Mesh(geometry, material);
      scene2.add(cube);

      // Add cube to clickable objects
      clickableObjects.push(cube);

      // Add edges to the cube
      const edges = new THREE.EdgesGeometry(geometry);
      const line = new THREE.LineSegments(edges, new THREE.LineBasicMaterial({ color: 0x000000 }));
      cube.add(line);

      // Raycaster
      const raycaster = new THREE.Raycaster();
      const mouse = new THREE.Vector2();

      // Mouse move event
      window.addEventListener('mousemove', onMouseMove, false);

      // Click event
      window.addEventListener('click', onClick, false);

      function onMouseMove(event) {
        mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
        mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;

        raycaster.setFromCamera(mouse, camera);
        const intersects = raycaster.intersectObjects(clickableObjects);

        if (intersects.length > 0) {
          // Mouse hover animation
          if (hoverTween === null) {
            hoverTween = new TWEEN.Tween(material.color)
              .to({ r: 1, g: 1, b: 0 }, 500) // Change color to yellow
              .easing(TWEEN.Easing.Quadratic.Out)
              .onUpdate(() => {
                material.needsUpdate = true;
              })
              .start();
          }
          
          // Distance line animation
          const intersectionPoint = intersects[0].point;
          const distance = intersectionPoint.distanceTo(cube.position);
          const points = [cube.position.clone(), intersectionPoint.clone()];
          const distanceLineGeometry = new THREE.BufferGeometry().setFromPoints(points);
          const distanceLineMaterial = new THREE.LineBasicMaterial({ color: 0xff0000, transparent: true, opacity: 0.5 });
          
          if (distanceLine) {
            scene2.remove(distanceLine);
          }
          distanceLine = new THREE.Line(distanceLineGeometry, distanceLineMaterial);
          scene2.add(distanceLine);
        } else {
          // Reset color when not hovering
          if (hoverTween !== null) {
            hoverTween.stop();
            hoverTween = null;
            new TWEEN.Tween(material.color)
              .to({ r: 0, g: 1, b: 0 }, 500) // Restore original color
              .easing(TWEEN.Easing.Quadratic.Out)
              .onUpdate(() => {
                material.needsUpdate = true;
              })
              .start();
          }

          // Remove distance line when not hovering
          if (distanceLine) {
            scene2.remove(distanceLine);
            distanceLine = null;
          }
        }
      }

      function onClick() {
        raycaster.setFromCamera(mouse, camera);
        const intersects = raycaster.intersectObjects(clickableObjects);

        if (intersects.length > 0) {
          alert('Box clicked!');
        }
      }

      // Resize event
      window.addEventListener('resize', onWindowResize, false);

      function onWindowResize() {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
      }
    }

    function animate() {
      requestAnimationFrame(animate);
      controls.update();
      TWEEN.update();
      renderer.render(scene2, camera);
    }
  </script>
</body>
</html>
