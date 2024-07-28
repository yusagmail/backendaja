<?php

use yii\helpers\Url;
use yii\web\View;

/** @var yii\web\View $this */
$this->registerJsFile('https://d3js.org/d3.v6.min.js', ['position' => View::POS_HEAD]);

?>

<?php /*
<div class="box">
    <div class="box-body asset-location-index">
        <div class="box-body">
            <div id="tooltips" class="tooltips"
                style="position: absolute; background-color: white; border: 1px solid black; padding: 5px; display: none; pointer-events: none;">
            </div>
            <div id="drawing" style="border: solid 1px black; width: 100%; height: 600px"></div>
        </div>
    </div>
</div>
*/ ?>

<script>
  function load2DRoomFromsJson(roomsString){
    console.log("Load 2D Room");
    console.log(rooms);
    /*
    if (Array.isArray(rooms)) {
        console.log('rooms adalah array');
        load2DRoomFromsJson(rooms);
    } else {
        console.error('rooms bukan array');
        console.log(typeof rooms);
    }
    */
    try {
      var rooms = JSON.parse(roomsString);
    } catch (error) {
      console.error('Gagal mengonversi string JSON:', error);
    }
    // URL of the image
    var imageUrl = "<?= Yii::getAlias('@web') . '/frontend/web/images/app_setting/Denah.jpg'; ?>";

    // Remove the 'administrator' segment from the image URL
    var parts = imageUrl.split('/');
    for (var i = 0; i < parts.length; i++) {
        if (parts[i] === 'administrator') {
            parts.splice(i, 1);
            break;
        }
    }
    var trimmedUrl = parts.join('/');

    // Create the SVG container with zoom and pan functionality
    var svg = d3.select("#denahContainer")
        .append("svg")
        .attr("width", "100%")
        .attr("height", "100%")
        .attr("viewBox", "0 0 1440 1282")
        .call(d3.zoom().on("zoom", function (event) {
            svg.attr("transform", event.transform);
        }))
        .append("g");

    // Add background image
    svg.append("image")
        .attr("xlink:href", trimmedUrl)
        .attr("width", "100%")
        .attr("height", "100%");

    // Room data with positions and labels
    /*
    var rooms = [
        { x: 300, y: 0, width: 840, height: 200, label: "Tangga Darurat" },
        { x: 0, y: 0, width: 200, height: 200, label: "Poli Penyakit kulit & Kelamin" },
        { x: 0, y: 200, width: 200, height: 200, label: "Poli Penyakit THT" },
        { x: 778, y: 0, width: 200, height: 200, label: "WC" },
        { x: 978, y: 0, width: 200, height: 200, label: "WC" },
        { x: 0, y: 400, width: 200, height: 200, label: "Poli Bedah Umum" },
        { x: 0, y: 600, width: 200, height: 200, label: "Poli Orthopedi" },
        { x: 0, y: 800, width: 200, height: 200, label: "Poli Bedah Umum" },
        { x: 220, y: 1082, width: 200, height: 200, label: "Klinik Gizi / Stunting" },
        { x: 420, y: 1082, width: 200, height: 200, label: "Klinik Spesialis bedah syaraf" },
        { x: 620, y: 1082, width: 200, height: 200, label: "Klinik Spesialis Jantung" },
        { x: 820, y: 1082, width: 200, height: 200, label: "Klinik Spesialis Urologi" },
        { x: 1020, y: 1082, width: 200, height: 200, label: "Poli Penyakit dalam 2" },
        { x: 1240, y: 704, width: 200, height: 295, label: "Poli Kedokteran Nuklir" },
        { x: 1240, y: 409, width: 200, height: 295, label: "Poli Kedokteran Nuklir" },
        { x: 1286, y: 123, width: 154, height: 286, label: "LIFT" },
        { x: 1220, y: 1082, width: 220, height: 200, label: "Poli Penyakit dalam 1" },
        { x: 0, y: 1082, width: 220, height: 200, label: "Poli Penyakit Syaraf" }
    ];
    */

    
    // Add rooms to the SVG
    rooms.forEach(function (room) {
        var group = svg.append("g")
            .attr("transform", "translate(" + room.x + "," + room.y + ")");

        group.append("rect")
            .attr("width", room.width)
            .attr("height", room.height)
            .attr("fill", "#D9D9D9")
            .attr("stroke", "black")
            .attr("stroke-width", 2);

        // Calculate text position to keep it centered
        var textX = room.width / 2;
        var textY = room.height / 2;

        // Add text in the center of the room
        group.append("text")
            .attr("x", textX)
            .attr("y", textY)
            .attr("dy", ".35em")
            .attr("text-anchor", "middle")
            .attr("font-family", "Inter")
            .attr("font-size", "24px")
            .attr("fill", "black")
            .text(room.label)
            .each(function () {
                var text = d3.select(this);
                var words = text.text().split(/\s+/).reverse();
                var word,
                    line = [],
                    lineNumber = 0,
                    lineHeight = 1.1, // ems
                    y = text.attr("y"),
                    dy = parseFloat(text.attr("dy")),
                    tspan = text
                        .text(null)
                        .append("tspan")
                        .attr("x", textX)
                        .attr("y", textY)
                        .attr("dy", dy + "em");
                while ((word = words.pop())) {
                    line.push(word);
                    tspan.text(line.join(" "));
                    if (tspan.node().getComputedTextLength() > room.width - 20) {
                        line.pop();
                        tspan.text(line.join(" "));
                        line = [word];
                        tspan = text
                            .append("tspan")
                            .attr("x", textX)
                            .attr("y", textY)
                            .attr("dy", ++lineNumber * lineHeight + dy + "em")
                            .text(word);
                    }
                }
            });
    });

    // Add squares with data for tooltips
    var squares = [
        { x: 90, y: 50, size: 30, color: 'red', details: 'Masker, Masker, Infus, Infus, Masker', url: 'http://localhost/assetmanagement/administrator/room/view?code=1.1.1' },
        { x: 90, y: 250, size: 30, color: 'red', details: 'Masker, Masker, Infus, Infus, Masker', url: 'http://localhost/assetmanagement/administrator/room/view?code=1.1.1' },
        { x: 90, y: 450, size: 30, color: 'red', details: 'Masker, Masker, Infus, Infus, Masker', url: 'http://localhost/assetmanagement/administrator/room/view?code=1.1.1' },
        { x: 90, y: 650, size: 30, color: 'red', details: 'Masker, Masker, Infus, Infus, Masker', url: 'http://localhost/assetmanagement/administrator/room/view?code=1.1.1' },
        { x: 90, y: 850, size: 30, color: 'red', details: 'Masker, Masker, Infus, Infus, Masker', url: 'http://localhost/assetmanagement/administrator/room/view?code=1.1.1' },
        { x: 100, y: 1130, size: 30, color: 'red', details: 'Masker, Masker, Infus, Infus, Masker', url: 'http://localhost/assetmanagement/administrator/room/view?code=1.1.1' },
        { x: 310, y: 1130, size: 30, color: 'red', details: 'Masker, Masker, Infus, Infus, Masker', url: 'http://localhost/assetmanagement/administrator/room/view?code=1.1.1' },
        { x: 510, y: 1130, size: 30, color: 'red', details: 'Masker, Masker, Infus, Infus, Masker', url: 'http://localhost/assetmanagement/administrator/room/view?code=1.1.1' },
        { x: 710, y: 1130, size: 30, color: 'red', details: 'Masker, Masker, Infus, Infus, Masker', url: 'http://localhost/assetmanagement/administrator/room/view?code=1.1.1' },
        { x: 910, y: 1130, size: 30, color: 'red', details: 'Masker, Masker, Infus, Infus, Masker', url: 'http://localhost/assetmanagement/administrator/room/view?code=1.1.1' },
        { x: 1110, y: 1130, size: 30, color: 'red', details: 'Masker, Masker, Infus, Infus, Masker', url: 'http://localhost/assetmanagement/administrator/room/view?code=1.1.1' },
        { x: 1325, y: 1130, size: 30, color: 'red', details: 'Masker, Masker, Infus, Infus, Masker', url: 'http://localhost/assetmanagement/administrator/room/view?code=1.1.1' },
        { x: 1325, y: 500, size: 30, color: 'red', details: 'Masker, Masker, Infus, Infus, Masker', url: 'http://localhost/assetmanagement/administrator/room/view?code=1.1.1' },
        { x: 1325, y: 800, size: 30, color: 'red', details: 'Masker, Masker, Infus, Infus, Masker', url: 'http://localhost/assetmanagement/administrator/room/view?code=1.1.1' },
    ];

    var tooltips = d3.select("#tooltips");

    // Add squares to the SVG
    svg.selectAll("rect.square")
        .data(squares)
        .enter()
        .append("rect")
        .attr("class", "square")
        .attr("x", function (d) { return d.x; })
        .attr("y", function (d) { return d.y; })
        .attr("width", function (d) { return d.size; })
        .attr("height", function (d) { return d.size; })
        .attr("fill", function (d) { return d.color; })
        .on("mouseover", function (event, d) {
            tooltips.style("display", "block")
                .html(d.details)
                .style("left", (event.pageX + 10) + "px")
                .style("top", (event.pageY - 15) + "px");
        })
        .on("mousemove", function (event) {
            tooltips.style("left", (event.pageX + 10) + "px")
                .style("top", (event.pageY - 15) + "px");
        })
        .on("mouseout", function () {
            tooltips.style("display", "none");
        })
        .on("click", function (event, d) {
            window.location.href = d.url; // Navigate to the URL specified in the data
        });

  }
</script>