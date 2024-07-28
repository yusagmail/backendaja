<script>
    //Added partially
    // Wait until the map has finished loading.
    var filenameAsset = '<?= $jsonFilenameAsset ?>';

    console.log("load data asset" + filenameAsset);
    map.on('load', () => {
        // Add a custom vector tileset source. This tileset contains
        // point features representing museums. Each feature contains
        // three properties. For example:
        // {
        //     alt_name: "Museo Arqueologico",
        //     name: "Museo Inka",
        //     tourism: "museum"
        // }


        // Add the Mapbox Terrain v2 vector tileset. Read more about
        // the structure of data in this tileset in the documentation:
        // https://docs.mapbox.com/vector-tiles/reference/mapbox-terrain-v2/

        map.addSource('main-data-asset', {
          type: 'geojson',
          // Use a URL for the value for the `data` property.
          //data: 'https://docs.mapbox.com/mapbox-gl-js/assets/main-data-asset.geojson'
          //data: dir+'/geojson/test.geojson'
          //data: dir+'/geojson/test-multiple-point3.geojson'
          'data': dirfile+'/localgeojson/' + filenameAsset
        });



        map.addLayer({
          'id': 'asset point',
          'type': 'circle',
          'source': 'main-data-asset',
          'layout': {
              'visibility': 'visible',
              //'after': 'top' // Atur lapisan ini di atas semua lapisan lain
          },
          'paint': {
            'circle-radius': 6,
            'circle-stroke-width': 0,
            'circle-color': 'green',
            'circle-stroke-color': 'white'
          }
        });

      /*
      map.addSource('places', {
        'type': 'geojson',
        'data': dirfile+'/localgeojson/' + filenameAsset
      });
      */
      
      /*
      layerUtama = map.addLayer({
      'id': 'poi-labels',
      'type': 'symbol',
      'source': 'places',
      'layout': {
        'text-field': ['get', 'description'],
        'text-variable-anchor': ['top', 'bottom', 'left', 'right'],
        //'text-radial-offset': 0.5,

        'text-justify': 'auto',
        //'font-scale': 0.8,
        'text-size': 10,
        'text-font': [
          'literal',
          ['Open Sans Regular']
        ]
        //'icon-image': ['get', 'icon']
      }
      });
      */

        // Add a black outline-asset around the polygon.
      map.addLayer({
        'id': 'outline-asset',
        'type': 'line',
        'source': 'main-data-asset',
        'layout': {},
        'paint': {
        'line-color': '#000',
        'line-width': 3
        }
      });

    /*
    map.loadImage(
      //'https://docs.mapbox.com/mapbox-gl-js/assets/custom_marker.png',
      //'local-icon/marker1.png',
      dirfile+'/local-icon/'+iconName,
      (error, image) => {
        if (error) 
        if (error) throw error;
        map.addImage('custom-marker', image);
      }
    );
    console.log(iconScale);
    */

    map.addLayer({
      'id': 'asset label',
      'type': 'symbol',
      'source': 'main-data-asset',
      'layout': {
        //'icon-image': 'custom-marker',
        // get the title name from the source's "title" property
        //'text-field': ['get', 'title'],
        'text-field': ['get', 'description'],
        'text-variable-anchor': [ 'top'],
        'icon-anchor': 'bottom', //Posisi icon mepet di titiknya
        'icon-size' : iconScale, //0.5 x ukuran asli
        'text-font': [
          'literal',
          ['Open Sans Regular']
        ],
        'text-size': 10,
        'text-offset': [0, 0.25], // (x,y)
        'text-anchor': 'top'
        }
      }
    );


    /*
    map.addLayer({
      'id': 'label',
      'type': 'symbol',
      'source': 'main-data-asset',
      'layout': {
        // get the title name from the source's "title" property
        //'text-field': ['get', 'title'],
        'text-field': ['get', 'description'],
        'text-variable-anchor': [ 'top'],
        'text-font': [
          'literal',
          ['Open Sans Regular']
        ],
        'text-size': 10,
        'text-offset': [0, 0.25], // (x,y)
        'text-anchor': 'top'
        }
      }
    );
    */

      map.on('click', 'asset point', (e) => {
        // Copy coordinates array.
        const coordinates = e.features[0].geometry.coordinates.slice();
        const description = e.features[0].properties.description;
        const id = e.features[0].properties.id;
         
        // Ensure that if the map is zoomed out such that multiple
        // copies of the feature are visible, the popup appears
        // over the copy being pointed to.
        while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
          coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
        }
         
        new mapboxgl.Popup()
          .setLngLat(coordinates)
          .setHTML("<h3><?= $labelDetail ?> #"+id+"</h3>Name : "+description+"<br><button class=\"btn btn-success btn-xsh\" onclick=\"getDetailAjax("+id+")\">Detail</button>")
          .addTo(map);
      });


      map.on('idle', () => {
        // If these two layers were not added to the map, abort
        if (!map.getLayer('asset point') || !map.getLayer('asset label') ) {
            return;
        }

        // Enumerate ids of the layers.
        const toggleableLayerIds = ['asset point', 'asset label'];

        // Set up the corresponding toggle button for each layer.
        for (const id of toggleableLayerIds) {
            // Skip layers that already have a button set up.
            if (document.getElementById(id)) {
                continue;
            }

            // Create a link.
            const link = document.createElement('a');
            link.id = id;
            link.href = '#';
            link.textContent = id;
            link.className = 'active';

            // Show or hide layer when the toggle is clicked.
            link.onclick = function (e) {
                const clickedLayer = this.textContent;
                e.preventDefault();
                e.stopPropagation();

                const visibility = map.getLayoutProperty(
                    clickedLayer,
                    'visibility'
                );

                // Toggle layer visibility by changing the layout object's visibility property.
                if (visibility === 'visible') {
                    map.setLayoutProperty(clickedLayer, 'visibility', 'none');
                    this.className = '';
                } else {
                    this.className = 'active';
                    map.setLayoutProperty(
                        clickedLayer,
                        'visibility',
                        'visible'
                    );
                }
            };

            const layers = document.getElementById('menu');
            layers.appendChild(link);
        }
    });

       
      // Change the cursor to a pointer when the mouse is over the places layer.
      map.on('mouseenter', 'asset point', () => {
      map.getCanvas().style.cursor = 'pointer';
      });
       
      // Change it back to a pointer when it leaves.
      map.on('mouseleave', 'asset point', () => {
      map.getCanvas().style.cursor = '';
      });

      map.on('click', 'asset label', (e) => {
        // Copy coordinates array.
        const coordinates = e.features[0].geometry.coordinates.slice();
        const description = e.features[0].properties.description;
        const id = e.features[0].properties.id;
         
        // Ensure that if the map is zoomed out such that multiple
        // copies of the feature are visible, the popup appears
        // over the copy being pointed to.
        while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
          coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
        }
         
        new mapboxgl.Popup()
          .setLngLat(coordinates)
          .setHTML("<h3><?= $labelDetail ?> #"+id+"</h3>Name : "+description+"<br><button class=\"btn btn-success btn-xsh\" onclick=\"getDetailAjax("+id+")\">Detail</button>")
          .addTo(map);
      });

       
      // Change the cursor to a pointer when the mouse is over the places layer.
      map.on('mouseenter', 'asset label', () => {
      map.getCanvas().style.cursor = 'pointer';
      });
       
      // Change it back to a pointer when it leaves.
      map.on('mouseleave', 'asset label', () => {
      map.getCanvas().style.cursor = '';
      });

    });

</script>

<Script>
    function clearMainMap(){
      //map.removeLayer('batas provinsi');
      map.removeLayer('outline-asset');
      map.removeLayer('asset label');
      map.removeLayer('asset point');
      map.removeSource('main-data-asset');
      map.removeImage('custom-marker');
      //map.removeSource('places');
    }
</Script>