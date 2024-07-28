<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BankPembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visualisasi Sebaran Aset';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->registerJsFile('@web/gojs/go.js', ['position' => \yii\web\View::POS_HEAD]);
?>
<div class="box">
    <div class="box-body bank-pembayaran-index">

        
        Nanti direplace dengan GOJSs
        
    
    </div>
    <div class="box-body">
        <div id="myDiagramDiv" style="border: solid 1px black; width: 100%; height: 600px"></div>
    </div>
</div>

<script id="code">
    function init() {
        // Since 2.2 you can also author concise templates with method chaining instead of GraphObject.make
        // For details, see https://gojs.net/latest/intro/buildingObjects.html
        const $ = go.GraphObject.make; // for conciseness in defining templates

        var INTERVAL = 2000; // this constant parameter cannot be set later

        myDiagram = new go.Diagram('myDiagramDiv', {
            initialContentAlignment: go.Spot.Center,
            isReadOnly: true, // allow selection but not moving or copying or deleting
            scaleComputation: (d, newsc) => {
                // only allow scales that are a multiple of 0.1
                var oldsc = Math.round(d.scale * 10);
                var sc = oldsc + (newsc * 10 > oldsc ? 1 : -1);
                if (sc < 1) sc = 1; // but disallow zero or negative!
                return sc / 10;
            },
            'toolManager.hoverDelay': 100, // how quickly tooltips are shown
        });

        // Background diagram
        myDiagram.add(
            $(go.Part, // this Part is not bound to any model data
                {
                    width: 840,
                    height: 570,
                    layerName: 'Background',
                    position: new go.Point(0, 0),
                    selectable: false,
                    pickable: false,
                },
                // Denah
                $(go.Picture, 'https://upload.wikimedia.org/wikipedia/commons/9/9a/Sample_Floorplan.jpg')
            )
        );

        // Titik Lokasi Asset
        myDiagram.nodeTemplate = $(go.Node,
            new go.Binding('location', 'loc'), // specified by data
            INTERVAL > 20 // don't animate if INTERVAL is <= 20 milliseconds
                ? new go.AnimationTrigger('position', { duration: INTERVAL, easing: go.Animation.EaseLinear })
                : {},
            { locationSpot: go.Spot.Center }, // at center of node
            $(go.Shape,
                'Circle',
                { width: 15, height: 15, strokeWidth: 3 },
                new go.Binding('fill', 'color', makeFill),
                new go.Binding('stroke', 'color', makeStroke)
            ), // also specified by data
            {
                // this tooltip shows the name and picture of the kitten
                toolTip: $('ToolTip',
                    $(go.Panel,
                        'Vertical',
                        $(go.Picture, { margin: 3 }, new go.Binding('source', 'src', (s) => 'images/' + s + '.png')),
                        $(go.TextBlock, { margin: 3 }, new go.Binding('text', 'key'))
                    )
                ), // end Adornment
            }
        );

        // Data Titik Lokasi Asset akan dimapping kebentuk seperti dibawah
        myDiagram.model.nodeDataArray = [
            { key: 'Alonzo', src: '50x40', loc: new go.Point(220, 135), color: 2 },
            { key: 'Coricopat', src: '55x55', loc: new go.Point(420, 250), color: 4 },
            { key: 'Garfield', src: '60x90', loc: new go.Point(640, 450), color: 6 },
            { key: 'Demeter', src: '80x50', loc: new go.Point(140, 350), color: 8 },
            { key: 'handsanitizer', src: '50x40', loc: new go.Point(123, 135), color: 7 },
        ];

        // generate some colors based on hue value
        function makeFill(number) {
            return HSVtoRGB(0.1 * number, 0.5, 0.7);
        }
        function makeStroke(number) {
            return HSVtoRGB(0.1 * number, 0.5, 0.5); // same color but darker (less V in HSV)
        }
        function HSVtoRGB(h, s, v) {
            var r, g, b, i, f, p, q, t;
            i = Math.floor(h * 6);
            f = h * 6 - i;
            p = v * (1 - s);
            q = v * (1 - f * s);
            t = v * (1 - (1 - f) * s);
            switch (i % 6) {
                case 0:
                    (r = v), (g = t), (b = p);
                    break;
                case 1:
                    (r = q), (g = v), (b = p);
                    break;
                case 2:
                    (r = p), (g = v), (b = t);
                    break;
                case 3:
                    (r = p), (g = q), (b = v);
                    break;
                case 4:
                    (r = t), (g = p), (b = v);
                    break;
                case 5:
                    (r = v), (g = p), (b = q);
                    break;
            }
            return 'rgb(' + Math.floor(r * 255) + ',' + Math.floor(g * 255) + ',' + Math.floor(b * 255) + ')';
        }
    }
    window.addEventListener('DOMContentLoaded', init);
</script>
