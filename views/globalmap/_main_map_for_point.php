<?php

//$this->registerCssFile("@web/plugins/fancybox/jquery.fancybox.css", ['position' => \yii\web\View::POS_HEAD]);
/*
$this->registerJsFile('@web/mapbase/mapbox-gl.js', [
  //'depends' => [\yii\web\JqueryAsset::className()]
  'position' => \yii\web\View::POS_HEAD
]);
$this->registerCssFile("@web/mapbase/mapbox-gl.css", ['position' => \yii\web\View::POS_HEAD]);
*/
?>
<link href="../mapbase/mapbox-gl.css" rel="stylesheet">
<script src="../mapbase/mapbox-gl-min.js"></script>    
<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>

<style>
    .marker {
        display: block;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        padding: 0;
    }
</style>
<style>
    #menu {
        background: #fff;
        position: absolute;
        z-index: 1;
        top: 60px;
        left: 80px;
        border-radius: 3px;
        width: 120px;
        border: 1px solid rgba(0, 0, 0, 0.4);
        font-family: 'Open Sans', sans-serif;
    }

    #menu a {
        font-size: 11px;
        color: #404040;
        display: block;
        margin: 0;
        padding: 0;
        padding: 4px;
        text-decoration: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.25);
        text-align: center;
    }

    #menu a:last-child {
        border: none;
    }

    #menu a:hover {
        background-color: #f8f8f8;
        color: #404040;
    }

    #menu a.active {
        background-color: #3887be;
        color: #ffffff;
    }

    #menu a.active:hover {
        background: #3074a4;
    }
</style>

<nav id="menu"></nav>
<div id="map"></div>
Base Map
<script>
var href = window.location.href;
var dir = href.substring(0, href.lastIndexOf('/')) + "/../mapbase/";
var dirfile = href.substring(0, href.lastIndexOf('/')) + "/../";
var filenamePoi = '<?= $jsonFilename ?>';
var iconName = '<?= $iconName ?>';
var iconScale = <?= $iconScale ?>;
var pointmap = '';
var modePeta = '<?= $mapstyle  ?>'; //streetmap or custom
var mapboxtoken = 'pk.eyJ1Ijoicm9zY29mcm9veiIsImEiOiJjbGp0b3JhdnkxNDRuM2ZvNDk3M3ppNWZ4In0.sOscaOIuLfUUQd6YsDaEKQ';
var style = {
  "version": 8,
  "sources": {
    "countries": {
      "type": "vector",
      // "url": "mapbox://map-id"
      // "url": "http://tileserver.com/layer.json", 
      "tiles": [dir+"countries/{z}/{x}/{y}.pbf"],
      "maxzoom": 6
    }
  },
  "glyphs": dir+"font/{fontstack}/{range}.pbf",
  "layers": [{
    "id": "background",
    "type": "background",
    "paint": {
      "background-color": "#ddeeff"
    }
  },{
    "id": "country-glow-outer",
    "type": "line",
    "source": "countries",
    "source-layer": "country",
    "layout": {
      "line-join":"round"
    },
    "paint": {
      "line-color": "#226688",
      "line-width": 5,
      "line-opacity": {
        "stops": [[0,0],[1,0.1]]
      }
    }
  },{
    "id": "country-glow-inner",
    "type": "line",
    "source": "countries",
    "source-layer": "country",
    "layout": {
      "line-join":"round"
    },
    "paint": {
      "line-color": "#226688",
      "line-width": {
        "stops": [[0,1.2],[1,1.6],[2,2],[3,2.4]]
      },
      "line-opacity":0.8,
    }
  // rainbow start
  },{
    "id": "area-white",
    "type": "fill",
    "source": "countries",
    "filter":["in","ADM0_A3",'ATA'],
    "source-layer": "country",
    "paint": {
      "fill-color": "#F0F8FF"
    }
  },{
    "id": "area-white2",
    "type": "fill",
    "source": "countries",
    "filter":["in","ADM0_A3",'ATA'],
    "source-layer": "country",
    "paint": {
      "fill-color": "#F0F8FF"
    }
  },{
    "id": "area-red",
    "type": "fill",
    "source": "countries",
    "filter":["in","ADM0_A3",'AFG','ALD','BEN','BLR','BWA','COK','COL','DNK','DOM','ERI','FIN','FRA','FRO','GIB','GNB','GNQ','GRC','GTM','JPN','KIR','LKA','MHL','MMR','MWI','NCL','OMN','RWA','SMR','SVK','SYR','TCD','TON','URY','WLF'],
    "source-layer": "country",
    "paint": {
      "fill-color": "#fdaf6b"
    }
  },{
    "id": "area-orange",
    "type": "fill",
    "source": "countries",
    "filter":["in","ADM0_A3",'AZE','BGD','CHL','CMR','CSI','DEU','DJI','GUY','HUN','IOA','JAM','LBN','LBY','LSO','MDG','MKD','MNG','MRT','NIU','NZL','PCN','PYF','SAU','SHN','STP','TTO','UGA','UZB','ZMB'],
    "source-layer": "country",
    "paint": {
      "fill-color": "#fdc663"
    }
  },{
    "id": "area-yellow",
    "type": "fill",
    "source": "countries",
    "filter":["in","ADM0_A3",'AGO','ASM','ATF','BDI','BFA','BGR','BLZ','BRA','CHN','CRI','ESP','HKG','HRV','IDN','IRN','ISR','KNA','LBR','LCA','MAC','MUS','NOR','PLW','POL','PRI','SDN','TUN','UMI','USA','USG','VIR','VUT'],
    "source-layer": "country",
    "paint": {
      "fill-color": "#fae364"
    }
  },{
    "id": "area-green",
    "type": "fill",
    "source": "countries",
    "filter":["in","ADM0_A3",'ARE','ARG','BHS','CIV','CLP','DMA','ETH','GAB','GRD','GRL','HMD','IND','IOT','IRL','IRQ','ITA','KOS','LUX','MEX','NAM','NER','PHL','PRT','RUS','SEN','SUR','TZA','VAT'],
    "source-layer": "country",
    "paint": {
      "fill-color": "#d3e46f"
    }
  },{
    "id": "area-turquoise",
    "type": "fill",
    "source": "countries",
    "filter":["in","ADM0_A3",'AUT','BEL','BHR','BMU','BRB','CYN','DZA','EST','FLK','GMB','GUM','HND','JEY','KGZ','LIE','MAF','MDA','NGA','NRU','SLB','SOL','SRB','SWZ','THA','TUR','VEN','VGB'],
    "source-layer": "country",
    "paint": {
      "fill-color": "#aadb78"
    }
  },{
    "id": "area-blue",
    "type": "fill",
    "source": "countries",
    "filter":["in","ADM0_A3",'AIA','BIH','BLM','BRN','CAF','CHE','COM','CPV','CUB','ECU','ESB','FSM','GAZ','GBR','GEO','KEN','LTU','MAR','MCO','MDV','NFK','NPL','PNG','PRY','QAT','SLE','SPM','SYC','TCA','TKM','TLS','VNM','WEB','WSB','YEM','ZWE'],
    "source-layer": "country",
    "paint": {
      "fill-color": "#a3cec5"
    }
  },{
    "id": "area-purple",
    "type": "fill",
    "source": "countries",
    "filter":["in","ADM0_A3",'ABW','ALB','AND','ATC','BOL','COD','CUW','CYM','CYP','EGY','FJI','GGY','IMN','KAB','KAZ','KWT','LAO','MLI','MNP','MSR','MYS','NIC','NLD','PAK','PAN','PRK','ROU','SGS','SVN','SWE','TGO','TWN','VCT','ZAF'],
    "source-layer": "country",
    "paint": {
      "fill-color": "#ceb5cf"
    }
  },{
    "id": "area-pink",
    "type": "fill",
    "source": "countries",
    "filter":["in","ADM0_A3",'ARM','ATG','AUS','BTN','CAN','COG','CZE','GHA','GIN','HTI','ISL','JOR','KHM','KOR','LVA','MLT','MNE','MOZ','PER','SAH','SGP','SLV','SOM','TJK','TUV','UKR','WSM'],
    "source-layer": "country",
    "paint": {
      "fill-color": "#f3c1d3"
    }
  // rainbow end
  },{
    "id": "geo-lines",
    "type": "line",
    "source": "countries",
    "source-layer": "geo-lines",
    "paint": {
      "line-color": "#226688",
      "line-width": {
        "stops": [[0,0.2],[4,1]]
      },
      "line-dasharray":[6,2]
    }
  },{
    "id": "land-border-country",
    "type": "line",
    "source": "countries",
    "source-layer": "land-border-country",
    "paint": {
      "line-color": "#fff",
      "line-width": {
        "base":1.5,
        "stops": [[0,0],[1,0.8],[2,1]]
      }
    }
  },{
    "id": "state",
    "type": "line",
    "source": "countries",
    "source-layer": "state",
    "minzoom": 3,
    "filter": ["in","ADM0_A3",'USA','CAN','AUS'],
    "paint": {
      "line-color": "#226688",
      "line-opacity": 0.25,
      "line-dasharray":[6,2,2,2],
      "line-width": 1.2
    }
  // LABELS
  },{
    "id": "country-abbrev",
    "type": "symbol",
    "source": "countries",
    "source-layer": "country-name",
    "minzoom":1.8,
    "maxzoom":3,
    "layout": {
      "text-field": "{ABBREV}",
      "text-font": ["Open Sans Semibold"],
      "text-transform": "uppercase",
      "text-max-width": 20,
      "text-size": {
        "stops": [[3,10],[4,11],[5,12],[6,16]]
      },
      "text-letter-spacing": {
        "stops": [[4,0],[5,1],[6,2]]
      },
      "text-line-height": {
        "stops": [[5,1.2],[6,2]]
      }
    },
    "paint": {
      "text-halo-color": "#fff",
      "text-halo-width": 1.5
    }
  },{
    "id": "country-name",
    "type": "symbol",
    "source": "countries",
    "source-layer": "country-name",
    "minzoom":3,
    "layout": {
      "text-field": "{NAME}",
      "text-font": ["Open Sans Semibold"],
      "text-transform": "uppercase",
      "text-max-width": 20,
      "text-size": {
        "stops": [[3,10],[4,11],[5,12],[6,16]]
      }
    },
    "paint": {
      "text-halo-color": "#fff",
      "text-halo-width": 1.5
    }
  },{
    "id": "geo-lines-lables",
    "type": "symbol",
    "source": "countries",
    "source-layer": "geo-lines",
    "minzoom":1,
    "layout": {
      "text-field": "{DISPLAY}",
      "text-font": ["Open Sans Semibold"],
      "text-offset": [0,1],
      "symbol-placement": "line",
      "symbol-spacing": 600,
      "text-size": 9
    },
    "paint": {
      "text-color": "#226688",
      "text-halo-width": 1.5
    }
  }]
};

  // TO MAKE THE MAP APPEAR YOU MUST
//mapboxgl.accessToken = 'pk.eyJ1Ijoicm9zY29mcm9veiIsImEiOiJjbGp0b3JhdnkxNDRuM2ZvNDk3M3ppNWZ4In0.sOscaOIuLfUUQd6YsDaEKQ';
//mapboxgl.accessToken = 'local-user';
mapboxgl.accessToken =  (modePeta == 'custom') ? 'local-user' : mapboxtoken;
    const geojson = {
        'type': 'FeatureCollection',
        'features': [
            {
                'type': 'Feature',
                'properties': {
                    'message': 'Foo',
                    'iconSize': [20, 20]
                },
                'geometry': {
                    'type': 'Point',
                    'coordinates': [106.283,6.1750]
                }
            },
            {
                'type': 'Feature',
                'properties': {
                    'message': 'Bar',
                    'iconSize': [20, 20]
                },
                'geometry': {
                    'type': 'Point',
                    'coordinates': [107.283,6.5750]
                }
            },
            {
                'type': 'Feature',
                'properties': {
                    'message': 'Baz',
                    'iconSize': [20, 20]
                },
                'geometry': {
                    'type': 'Point',
                    'coordinates': [108.283,7.1750]
                }
            }
        ]
    };

    const map = new mapboxgl.Map({
        container: 'map',
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        //style: 'mapbox://styles/mapbox/streets-v12',
        //style: style,
        style: (modePeta == 'custom') ? style : 'mapbox://styles/mapbox/streets-v12',
        //center: [ 106.283,6.1750],
        //zoom: 4,
        center: [ 107.628882,-6.907267],
        zoom: 8,
    });

    var layerUtama;
</script>



<script>
    var marker = new mapboxgl.Marker();

    function add_marker (event) {
      const myDivElem = document.querySelector("#map");
      myDivElem.style.cursor = "pointer";
      var coordinates = event.lngLat;
      console.log('Lng:', coordinates.lng, 'Lat:', coordinates.lat);
      marker.setLngLat(coordinates).addTo(map);
      setInputLatLang( coordinates.lat, coordinates.lng);
    }

    map.on('click', add_marker);

    // After the last frame rendered before the map enters an "idle" state.
    map.on('idle', () => {
        // If these two layers were not added to the map, abort
        if (!map.getLayer('points') || !map.getLayer('points-icon') ) {
            return;
        }

        // Enumerate ids of the layers.
        const toggleableLayerIds = ['points', 'points-icon'];

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
</script>
