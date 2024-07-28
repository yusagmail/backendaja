<?php
use yii\helpers\Url;
use yii\web\View;

/** @var yii\web\View $this */
$this->registerJsFile('https://d3js.org/d3.v6.min.js', ['position' => View::POS_HEAD]);
?>

<script>
function load2DRoomFromsJson(roomsString) {
    console.log("Attempting to load 2D Room layout");

    var container = d3.select("#denahContainer3D");
    container.selectAll("svg").remove();
    
    // Clear existing SVG to prevent overlap or errors
    var container = d3.select("#denahContainer");
    container.selectAll("svg").remove();

    try {
        var rooms = JSON.parse(roomsString);
        console.log("Parsed rooms:", rooms);
    } catch (error) {
        console.error("Failed to parse JSON string:", error);
        return; // Stop further execution if parsing fails
    }

    if (!Array.isArray(rooms)) {
        console.error("Data received is not an array");
        return;
    }

    // Create the SVG container
    var svg = container
        .append("svg")
        .attr("width", "100%")
        .attr("height", "100%")
        .attr("viewBox", "0 0 1440 1282");

    // Append a group element that will hold all the rooms and will be transformed
    var g = svg.append("g");

    // Implement zoom and pan functionality
    svg.call(d3.zoom().on("zoom", function(event) {
        g.attr("transform", event.transform);
    }));

    // Create a tooltip div that is hidden by default
    var tooltip = d3.select("body").append("div")
        .style("position", "absolute")
        .style("visibility", "hidden")
        .style("background", "rgba(0, 0, 0, 0.8)")
        .style("color", "#fff")
        .style("padding", "5px 10px")
        .style("border-radius", "5px")
        .style("font-family", "Inter")
        .style("font-size", "14px");

    // Iterate through each room data and append to the transformable group 'g'
    rooms.forEach(function(room) {
        if (room.width > 0 && room.height > 0) { // Check if room dimensions are valid
            var group = g.append("g")
                .attr("transform", `translate(${room.x}, ${room.y})`);

            group.append("rect")
                .attr("width", room.width)
                .attr("height", room.height)
                .attr("fill", "#D9D9D9")
                .attr("stroke", "black")
                .attr("stroke-width", 2);

            var textX = room.width / 2;
            var textY = room.height / 2;

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

            // Display asset items within the room as dots
            if (Array.isArray(room.assets) && room.assets.length > 0) {
                room.assets.forEach(function(asset) {
                    // Generate random positions within the room for each dot
                    var assetX = Math.random() * room.width;
                    var assetY = Math.random() * room.height;

                    var assetGroup = group.append("g")
                        .attr("transform", `translate(${assetX}, ${assetY})`);

                    assetGroup.append("circle")
                        .attr("r", 20)
                        .attr("fill", "red")
                        .attr("stroke", "black")
                        .attr("stroke-width", 1)
                        .on("mouseover", function() {
                            return tooltip.style("visibility", "visible").text(asset.keterangan);
                        })
                        .on("mousemove", function(event) {
                            return tooltip
                                .style("top", (event.pageY - 10) + "px")
                                .style("left", (event.pageX + 10) + "px");
                        })
                        .on("mouseout", function() {
                            return tooltip.style("visibility", "hidden");
                        });
                });
            }
        }
    });
}
</script>
