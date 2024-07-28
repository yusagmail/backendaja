<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MrpProjectProductItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<?php /*
<script src="<?= Yii::$app->request->baseUrl; ?>../../backend/web/jscharting/jscharting.js"></script>
<script src="<?= Yii::$app->request->baseUrl; ?>../../backend/web/jscharting/types.js"></script>
<script src="<?= Yii::$app->request->baseUrl; ?>../../backend/web/jscharting/toolbar.js"></script>
*/ ?>

<?php /*
<script src="https://unpkg.com/gojs@2.2.4/release/go.js"></script>


Sumber :
https://gojs.net/latest/intro/trees.html
*/ ?>

<?php
$this->registerCssFile("@web/plugins/fancybox/jquery.fancybox.css", ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('@web/plugins/fancybox/jquery.fancybox.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<?php
$this->registerJs(
    '  
    $(".various").fancybox({
        maxWidth    : 1200,
        maxHeight   : 700,
        fitToView   : true,
        width        : 600,
        height        : 300,
        // height       : "70%",
        autoSize    : false,
        closeClick  : false,
        openEffect  : "none",
        closeEffect : "none"
    });
        '
);
?>
        <?php
        $buttonAdd =  Html::a(
                            '<i class="fa fa-fw fa-plus"></i>',
                            ['material/create', ],
                            ['class' => 'btn btn-warning  btn-block various fancybox.ajax', 'id'=>'button-add']

                        );
        echo $buttonAdd;
        ?>
<script src="<?= Yii::$app->request->baseUrl; ?>../../backend/web/gojs/go.js"></script>

  <div id="allSampleContent" class="p-4 w-full">

  <style type="text/css">
    #myOverviewDiv {
      position: absolute;
      width: 200px;
      height: 100px;
      top: 10px;
      left: 10px;
      background-color: #f2f2f2;
      z-index: 300; /* make sure its in front */
      border: solid 1px #7986cb;
    }
  </style>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet" type="text/css">
    <script id="code">
    function init() {

      // Since 2.2 you can also author concise templates with method chaining instead of GraphObject.make
      // For details, see https://gojs.net/latest/intro/buildingObjects.html
      const $ = go.GraphObject.make;  // for conciseness in defining templates

      // some constants that will be reused within templates
      var mt8 = new go.Margin(8, 0, 0, 0);
      var mr8 = new go.Margin(0, 8, 0, 0);
      var ml8 = new go.Margin(0, 0, 0, 8);
      var roundedRectangleParams = {
        parameter1: 2,  // set the rounded corner
        spot1: go.Spot.TopLeft, spot2: go.Spot.BottomRight  // make content go all the way to inside edges of rounded corners
      };

      myDiagram =
        $(go.Diagram, "myDiagramDiv",  // the DIV HTML element
          {
            // Put the diagram contents at the top center of the viewport
            initialDocumentSpot: go.Spot.Top,
            initialViewportSpot: go.Spot.Top,
            // OR: Scroll to show a particular node, once the layout has determined where that node is
            // "InitialLayoutCompleted": e => {
            //  var node = e.diagram.findNodeForKey(28);
            //  if (node !== null) e.diagram.commandHandler.scrollToPart(node);
            // },
            layout:
              $(go.TreeLayout,  // use a TreeLayout to position all of the nodes
                {
                  isOngoing: false,  // don't relayout when expanding/collapsing panels
                  treeStyle: go.TreeLayout.StyleLastParents,
                  // properties for most of the tree:
                  angle: 90,
                  layerSpacing: 80,
                  // properties for the "last parents":
                  alternateAngle: 0,
                  alternateAlignment: go.TreeLayout.AlignmentStart,
                  alternateNodeIndent: 15,
                  alternateNodeIndentPastParent: 1,
                  alternateNodeSpacing: 15,
                  alternateLayerSpacing: 40,
                  alternateLayerSpacingParentOverlap: 1,
                  alternatePortSpot: new go.Spot(0.001, 1, 20, 0),
                  alternateChildPortSpot: go.Spot.Left
                })
          });

      // This function provides a common style for most of the TextBlocks.
      // Some of these values may be overridden in a particular TextBlock.
      function textStyle(field) {
        return [
          {
            font: "12px Roboto, sans-serif", stroke: "rgba(0, 0, 0, .60)",
            visible: false  // only show textblocks when there is corresponding data for them
          },
          new go.Binding("visible", field, val => val !== undefined)
        ];
      }

      // define Converters to be used for Bindings
      function theNationFlagConverter(nation) {
        //return "https://www.nwoods.com/images/emojiflags/" + nation + ".png";
        return "https://en.wikipedia.org/wiki/Bogie#/media/File:Seitenkipper-Ua4201-Drehgestell.jpg"
      }

      // get the text for the tooltip from the data on the object being hovered over
      function tooltipTextConverter(data) {
        var str = "";
        var e = myDiagram.lastInput;
        var currobj = e.targetObject;
        if (currobj !== null && (currobj.name === "ButtonA" ||
          (currobj.panel !== null && currobj.panel.name === "ButtonA"))) {
          str = data.aToolTip;
        } else {
          str = data.bToolTip;
        }
        return str;
      }

      function buttonAddChild(e, port) {
        var node = port.part;
        document.getElementById("button-add").click();
        alert("switch child o mine" + node);
      }

      function buttonExpandCollapse(e, port) {
        var node = port.part;
        alert(node);
      }

      // define tooltips for buttons
      var tooltipTemplate =
        $("ToolTip",
          { "Border.fill": "whitesmoke", "Border.stroke": "lightgray" },
          $(go.TextBlock,
            {
              font: "8pt sans-serif",
              wrap: go.TextBlock.WrapFit,
              desiredSize: new go.Size(200, NaN),
              alignment: go.Spot.Center,
              margin: 6
            },
            new go.Binding("text", "", tooltipTextConverter))
        );      

      // define the Node template
      myDiagram.nodeTemplate =
        $(go.Node, "Auto",
          {
            locationSpot: go.Spot.Top,
            isShadowed: true, shadowBlur: 1,
            shadowOffset: new go.Point(0, 1),
            shadowColor: "rgba(0, 0, 255, .64)",
            selectionAdornmentTemplate:  // selection adornment to match shape of nodes
              $(go.Adornment, "Auto",
                $(go.Shape, "RoundedRectangle", roundedRectangleParams,
                  { fill: null, stroke: "#7986cb", strokeWidth: 4 }
                ),
                $(go.Placeholder)
              )  // end Adornment
          },
          $(go.Shape, "RoundedRectangle", roundedRectangleParams,
            { name: "SHAPE", fill: "#ff0000", strokeWidth: 1 },
            // gold if highlighted, white otherwise
            new go.Binding("fill", "isHighlighted", h => h ? "gold" : "#f7f7f7").ofObject() //Warna backgroundnya
          ),
          $(go.Panel, "Vertical",
            $(go.Panel, "Horizontal",
              { margin: 8 },
              $(go.Picture,  // flag image, only visible if a nation is specified
                { margin: mr8, visible: false, desiredSize: new go.Size(50, 50) },
                new go.Binding("source", "nation", theNationFlagConverter),
                new go.Binding("visible", "nation", nat => nat !== undefined)
              ),
              $(go.Panel, "Table",
                $(go.TextBlock,
                  {
                    row: 0, alignment: go.Spot.Left,
                    font: "16px Roboto, sans-serif",
                    stroke: "rgba(0, 0, 0, .87)",
                    maxSize: new go.Size(160, NaN)
                  },
                  new go.Binding("text", "name")
                ),
                $(go.TextBlock, textStyle("title"),
                  {
                    row: 1, alignment: go.Spot.Left,
                    maxSize: new go.Size(160, NaN)
                  },
                  new go.Binding("text", "title")
                ),
                $("PanelExpanderButton", "INFO",
                  { row: 0, column: 1, rowSpan: 2, margin: ml8 }
                )
              )
            ),
            $(go.Shape, "LineH",
              {
                stroke: "rgba(0, 0, 0, .60)", strokeWidth: 1,
                height: 1, stretch: go.GraphObject.Horizontal
              },
              new go.Binding("visible").ofObject("INFO")  // only visible when info is expanded
            ),

            $(go.Panel, "Vertical", new go.Binding("visible", true),
              {
                name: "INFO",  // identify to the PanelExpanderButton
                stretch: go.GraphObject.Horizontal,  // take up whole available width
                margin: 8,
                defaultAlignment: go.Spot.Left,  // thus no need to specify alignment on each element
              },
              $(go.TextBlock, textStyle("headOf"),
                new go.Binding("text", "headOf", head => "Head of: " + head)
              ),
              $(go.Panel, "Horizontal",
                { defaultStretch: go.GraphObject.Fill, margin: 3 },
                $("Button",  // button A
                  {
                    name: "ButtonA",
                    click: buttonAddChild,
                    //click: function(e, obj) { $("#button-add").click(); alert("started!");  },
                    toolTip: tooltipTemplate
                  },
                  new go.Binding("portId", "a"),
                  $(go.TextBlock,
                    { font: '500 12px Roboto, sans-serif' },
                    new go.Binding("text", "addChild"))
                ),  // end button A
                $(go.TextBlock,
                    { font: '500 12px Roboto, sans-serif' },
                    "  "),
                $("Button",  // button B
                  {
                    name: "ButtonA",
                    click: buttonExpandCollapse,
                    toolTip: tooltipTemplate
                  },
                  new go.Binding("portId", "a"),
                  $(go.TextBlock,
                    { font: '500 11px Roboto, sans-serif' },
                    new go.Binding("text", "addPeer"))
                ),  // end button B
               ),
              $(go.TextBlock, textStyle("boss"),
                new go.Binding("margin", "headOf", head => mt8), // some space above if there is also a headOf value
                new go.Binding("text", "boss", boss => {
                  var boss = myDiagram.model.findNodeDataForKey(boss);
                  if (boss !== null) {
                    return "Proses durasion: " + boss.name;
                  }
                  return "";
                })
              )
            )
          )
        );

      // define the Link template, a simple orthogonal line
      myDiagram.linkTemplate =
        $(go.Link, go.Link.Orthogonal,
          { corner: 5, selectable: false },
          $(go.Shape, { strokeWidth: 3, stroke: "#424242" }));  // dark gray, rounded corner links


      // set up the nodeDataArray, describing each person/position
      var nodeDataArray = [
        { key: 0, name: "Bogie Assy", title: "BGA"},
        { key: 1, boss: 0, name: "Frame", nation: "Ireland", title: "FRA" , addChild:"Add Child", addPeer:"Add Peer"},
        { key: 3, boss: 0, name: "Suspension System", title: "SSS" },
        { key: 9, boss: 0, name: "Brake System" , title: "BRS" },
        { key: 4, boss: 0, name: "Wheel Assy", title: "WHA",  },
        { key: 10, boss: 1, name: "Side Frame",  title: "SFR",  },
        { key: 11, boss: 1, name: "Boolster", nation: "Argentina", title: "BLS",  },
        { key: 12, boss: 1, name: "End Beam", nation: "Argentina", title: "EBA",  },
        /*
        { key: 10, boss: 4, name: "Other Employees" },
        { key: 5, boss: 1, name: "Václav Mikulka", nation: "CzechRepublic", title: "Codification Division Director", headOf: "Codification Division" },
        { key: 11, boss: 5, name: "Other Employees" },
        { key: 6, boss: 1, name: "Sergei Tarassenko", nation: "Russia", title: "Division for Ocean Affairs and the Law of the Sea Director", headOf: "Division for Ocean Affairs and the Law of the Sea" },
        { key: 12, boss: 6, name: "Alexandre Tagore Medeiros de Albuquerque", nation: "Brazil", title: "Chairman of the Commission on the Limits of the Continental Shelf", headOf: "The Commission on the Limits of the Continental Shelf" },
        { key: 17, boss: 12, name: "Peter F. Croker", nation: "Ireland", title: "Chairman of the Committee on Confidentiality", headOf: "The Committee on Confidentiality" },
        { key: 31, boss: 17, name: "Michael Anselme Marc Rosette", nation: "Seychelles", title: "Vice Chairman of the Committee on Confidentiality" },
        { key: 32, boss: 17, name: "Kensaku Tamaki", nation: "Japan", title: "Vice Chairman of the Committee on Confidentiality" },
        { key: 33, boss: 17, name: "Osvaldo Pedro Astiz", nation: "Argentina", title: "Member of the Committee on Confidentiality" },
        { key: 34, boss: 17, name: "Yuri Borisovitch Kazmin", nation: "Russia", title: "Member of the Committee on Confidentiality" },
        { key: 18, boss: 12, name: "Philip Alexander Symonds", nation: "Australia", title: "Chairman of the Committee on provision of scientific and technical advice to coastal States", headOf: "Committee on provision of scientific and technical advice to coastal States" },
        { key: 35, boss: 18, name: "Emmanuel Kalngui", nation: "Cameroon", title: "Vice Chairman of the Committee on provision of scientific and technical advice to coastal States" },
        { key: 36, boss: 18, name: "Sivaramakrishnan Rajan", nation: "India", title: "Vice Chairman of the Committee on provision of scientific and technical advice to coastal States" },
        { key: 37, boss: 18, name: "Francis L. Charles", nation: "TrinidadAndTobago", title: "Member of the Committee on provision of scientific and technical advice to costal States" },
        { key: 38, boss: 18, name: "Mihai Silviu German", nation: "Romania", title: "Member of the Committee on provision of scientific and technical advice to costal States" },
        { key: 19, boss: 12, name: "Lawrence Folajimi Awosika", nation: "Nigeria", title: "Vice Chairman of the Commission on the Limits of the Continental Shelf" },
        { key: 20, boss: 12, name: "Harald Brekke", nation: "Norway", title: "Vice Chairman of the Commission on the Limits of the Continental Shelf" },
        { key: 21, boss: 12, name: "Yong-Ahn Park", nation: "SouthKorea", title: "Vice Chairman of the Commission on the Limits of the Continental Shelf" },
        { key: 22, boss: 12, name: "Abu Bakar Jaafar", nation: "Malaysia", title: "Chairman of the Editorial Committee", headOf: "Editorial Committee" },
        { key: 23, boss: 12, name: "Galo Carrera Hurtado", nation: "Mexico", title: "Chairman of the Training Committee", headOf: "Training Committee" },
        { key: 24, boss: 12, name: "Indurlall Fagoonee", nation: "Mauritius", title: "Member of the Commission on the Limits of the Continental Shelf" },
        { key: 25, boss: 12, name: "George Jaoshvili", nation: "Georgia", title: "Member of the Commission on the Limits of the Continental Shelf" },
        { key: 26, boss: 12, name: "Wenzhang Lu", nation: "China", title: "Member of the Commission on the Limits of the Continental Shelf" },
        { key: 27, boss: 12, name: "Isaac Owusu Orudo", nation: "Ghana", title: "Member of the Commission on the Limits of the Continental Shelf" },
        { key: 28, boss: 12, name: "Fernando Manuel Maia Pimentel", nation: "Portugal", title: "Member of the Commission on the Limits of the Continental Shelf" },
        { key: 7, boss: 1, name: "Renaud Sorieul", nation: "France", title: "International Trade Law Division Director", headOf: "International Trade Law Division" },
        { key: 13, boss: 7, name: "Other Employees" },
        { key: 8, boss: 1, name: "Annebeth Rosenboom", nation: "Netherlands", title: "Treaty Section Chief", headOf: "Treaty Section" },
        { key: 14, boss: 8, name: "Bradford Smith", nation: "UnitedStates", title: "Substantive Legal Issues Head", headOf: "Substantive Legal Issues" },
        { key: 29, boss: 14, name: "Other Employees" },
        { key: 15, boss: 8, name: "Andrei Kolomoets", nation: "Russia", title: "Technical/Legal Issues Head", headOf: "Technical/Legal Issues" },
        { key: 30, boss: 15, name: "Other Employees" },
        { key: 16, boss: 8, name: "Other Employees" },
        { key: 2, boss: 0, name: "Heads of Other Offices/Departments" }
        */
      ];

      // create the Model with data for the tree, and assign to the Diagram
      myDiagram.model =
        new go.TreeModel(
          {
            nodeParentKeyProperty: "boss",  // this property refers to the parent node data
            nodeDataArray: nodeDataArray
          });

      // Overview
      myOverview =
        $(go.Overview, "myOverviewDiv",  // the HTML DIV element for the Overview
          { observed: myDiagram, contentAlignment: go.Spot.Center });   // tell it which Diagram to show and pan
    }

    // the Search functionality highlights all of the nodes that have at least one data property match a RegExp
    function searchDiagram() {  // called by button
      var input = document.getElementById("mySearch");
      if (!input) return;
      myDiagram.focus();

      myDiagram.startTransaction("highlight search");

      if (input.value) {
        // search four different data properties for the string, any of which may match for success
        // create a case insensitive RegExp from what the user typed
        var safe = input.value.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        var regex = new RegExp(safe, "i");
        var results = myDiagram.findNodesByExample({ name: regex },
          { nation: regex },
          { title: regex },
          { headOf: regex });
        myDiagram.highlightCollection(results);
        // try to center the diagram at the first node that was found
        if (results.count > 0) myDiagram.centerRect(results.first().actualBounds);
      } else {  // empty string only clears highlighteds collection
        myDiagram.clearHighlighteds();
      }

      myDiagram.commitTransaction("highlight search");
    }
    window.addEventListener('DOMContentLoaded', init);
  </script>

<div id="sample" style="position: relative;">
  <div id="myDiagramDiv" style="background-color: rgb(255, 255, 255); border: 1px solid black; width: 100%; height: 700px; position: relative; -webkit-tap-highlight-color: rgba(255, 255, 255, 0); cursor: auto;"><canvas tabindex="0" width="1229" height="681" style="position: absolute; top: 0px; left: 0px; z-index: 2; user-select: none; touch-action: none; width: 1229px; height: 681px; cursor: auto;">This text is displayed if your browser does not support the Canvas HTML element.</canvas><div style="position: absolute; overflow: auto; width: 1246px; height: 698px; z-index: 1;"><div style="position: absolute; width: 3433.65px; height: 1590.37px;"></div></div></div>
  <div id="myOverviewDiv" style="-webkit-tap-highlight-color: rgba(255, 255, 255, 0);"><canvas tabindex="0" width="198" height="98" style="position: absolute; top: 0px; left: 0px; z-index: 2; user-select: none; touch-action: none; width: 198px; height: 98px;">This text is displayed if your browser does not support the Canvas HTML element.</canvas><div style="position: absolute; overflow: auto; width: 198px; height: 98px; z-index: 1;"><div style="position: absolute; width: 1px; height: 1px;"></div></div></div> <!-- Styled in a <style> tag at the top of the html page -->
  <p>


</script>