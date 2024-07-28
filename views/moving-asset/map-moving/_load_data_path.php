<script>
    //Added partially
    // Wait until the map has finished loading.
    var filenamePath = '<?= $jsonFilenamePath ?>';
    function loadMainDataPath(){
    console.log("load main map polyline or path - " + filenamePath);

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

        console.log(dirfile+'/localgeojson/' + filenamePath);
        map.addSource('jalur-path', {
          type: 'geojson',
          // Use a URL for the value for the `data` property.
          //data: 'https://docs.mapbox.com/mapbox-gl-js/assets/prov-indonesia.geojson'
          //data: dir+'/geojson/test.geojson'
          //data: dir+'/geojson/test-multiple-point3.geojson'
          'data': dirfile+'/localgeojson/' + filenamePath
        });

        // Add a new layer to visualize the polyline.
        map.addLayer({
          'id': 'jalur-path',
          'type': 'line',
          'source': 'jalur-path', // reference the data source
          'layout': {
          'line-join': 'round',
          'line-cap': 'round'
          },
          'paint': {
          'line-color': '#999',
          'line-width': 6
          }
        });
        // Add a black outline-jalur around the polygon.
        map.addLayer({
          'id': 'outline-jalur',
          'type': 'line',
          'source': 'jalur-path',
          'layout': {},
          'paint': {
          'line-color': '#000',
          'line-width': 1
          }
        });
                
        /*
        map.addSource('places', {
          'type': 'geojson',
          'data': dirfile+'/localgeojson/' + filenamePath
        });
        */
        
        map.addLayer({
        'id': 'jalur-label',
        'type': 'symbol',
        'source': 'jalur-path',
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

      /*
      map.on('click', 'points-xyz', (e) => {
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
          .setHTML("<h3>AA<?= $labelDetail ?> #"+id+"</h3>Name : "+description+"<br><button class=\"btn btn-success btn-xsh\" onclick=\"getDetailAjax("+id+")\">Detail</button>")
          .addTo(map);
      });
      */

       
      // Change the cursor to a pointer when the mouse is over the places layer.
      map.on('mouseenter', 'outline-jalur', () => {
      map.getCanvas().style.cursor = 'pointer';
      });
       
      // Change it back to a pointer when it leaves.
      map.on('mouseleave', 'outline-jalur', () => {
      map.getCanvas().style.cursor = '';
      });

      map.on('click', 'points-icon', (e) => {
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
          .setHTML("<h3>BB<?= $labelDetail ?> #"+id+"</h3>Name : "+description+"<br><button class=\"btn btn-success btn-xsh\" onclick=\"getDetailAjax("+id+")\">Detail</button>")
          .addTo(map);
      });

      map.on('click', 'jalur-path', (e) => {
        const description = (e.features[0].properties.name);
        const id = e.features[0].properties.id;
        new mapboxgl.Popup()
        .setLngLat(e.lngLat)
        
        .setHTML("<h3>CC<?= $labelDetail ?> #"+id+"</h3>Name : "+description+"<br><button class=\"btn btn-success btn-xsh\" onclick=\"getDetailAjax("+id+")\">Detail</button>")
        .addTo(map);
      });
       
      // Change the cursor to a pointer when the mouse is over the places layer.
      map.on('mouseenter', 'jalur-path', () => {
      map.getCanvas().style.cursor = 'pointer';
      });
       
      // Change it back to a pointer when it leaves.
      map.on('mouseleave', 'jalur-path', () => {
      map.getCanvas().style.cursor = '';


      });

}

console.log("load data path jalur");
map.on('load', loadMainDataPath);
</script>

<Script>
    function clearMainMapOld(){
      //map.removeLayer('batas provinsi');
      map.removeLayer('outline-jalur');
      map.removeLayer('jalur-path');
      map.removeLayer('jalur-label');
      //map.removeLayer('points-icon');
      //map.removeLayer('points');
      map.removeSource('jalur-path');
      //map.removeImage('custom-marker');
      //map.removeSource('places');
    }

    function clearMainMap(){
        if (map.getLayer("outline-jalur")) {
            map.removeLayer('outline-jalur');
        }

        if (map.getLayer("jalur-path")) {
            map.removeLayer('jalur-path');
        }
        if (map.getLayer("jalur-label")) {
            map.removeLayer('jalur-label');
        }
        if (map.getSource("jalur-path")) {
            map.removeSource('jalur-path');
        }
        if (map.getSource("places")) {
            map.removeSource('places');
        }
    }
</Script>