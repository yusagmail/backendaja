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
*/ ?>

<script src="<?= Yii::$app->request->baseUrl; ?>../../backend/web/gojs/go.js"></script>
  <p>
    This is a minimalist HTML and JavaScript skeleton of the GoJS Sample
    <a href="https://gojs.net/latest/samples/orgChartStatic.html">orgChartStatic.html</a>. It was automatically generated from a button on the sample page,
    and does not contain the full HTML. It is intended as a starting point to adapt for your own usage.
    For many samples, you may need to inspect the
    <a href="https://github.com/NorthwoodsSoftware/GoJS/blob/master/samples/orgChartStatic.html">full source on Github</a>
    and copy other files or scripts.
  </p>
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
        return "https://www.nwoods.com/images/emojiflags/" + nation + ".png";
      }

      // define the Node template
      myDiagram.nodeTemplate =
        $(go.Node, "Auto",
          {
            locationSpot: go.Spot.Top,
            isShadowed: true, shadowBlur: 1,
            shadowOffset: new go.Point(0, 1),
            shadowColor: "rgba(0, 0, 0, .14)",
            selectionAdornmentTemplate:  // selection adornment to match shape of nodes
              $(go.Adornment, "Auto",
                $(go.Shape, "RoundedRectangle", roundedRectangleParams,
                  { fill: null, stroke: "#7986cb", strokeWidth: 3 }
                ),
                $(go.Placeholder)
              )  // end Adornment
          },
          $(go.Shape, "RoundedRectangle", roundedRectangleParams,
            { name: "SHAPE", fill: "#ffffff", strokeWidth: 0 },
            // gold if highlighted, white otherwise
            new go.Binding("fill", "isHighlighted", h => h ? "gold" : "#ffffff").ofObject()
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
            $(go.Panel, "Vertical",
              {
                name: "INFO",  // identify to the PanelExpanderButton
                stretch: go.GraphObject.Horizontal,  // take up whole available width
                margin: 8,
                defaultAlignment: go.Spot.Left,  // thus no need to specify alignment on each element
              },
              $(go.TextBlock, textStyle("headOf"),
                new go.Binding("text", "headOf", head => "Head of: " + head)
              ),
              $(go.TextBlock, textStyle("boss"),
                new go.Binding("margin", "headOf", head => mt8), // some space above if there is also a headOf value
                new go.Binding("text", "boss", boss => {
                  var boss = myDiagram.model.findNodeDataForKey(boss);
                  if (boss !== null) {
                    return "Reporting to: " + boss.name;
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
        { key: 0, name: "Ban Ki-moon 반기문", nation: "SouthKorea", title: "Secretary-General of the United Nations", headOf: "Secretariat" },
        { key: 1, boss: 0, name: "Patricia O'Brien", nation: "Ireland", title: "Under-Secretary-General for Legal Affairs and United Nations Legal Counsel", headOf: "Office of Legal Affairs" },
        { key: 3, boss: 1, name: "Peter Taksøe-Jensen", nation: "Denmark", title: "Assistant Secretary-General for Legal Affairs" },
        { key: 9, boss: 3, name: "Other Employees" },
        { key: 4, boss: 1, name: "Maria R. Vicien - Milburn", nation: "Argentina", title: "General Legal Division Director", headOf: "General Legal Division" },
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
  <div id="myDiagramDiv" style="background-color: rgb(242, 242, 242); border: 1px solid black; width: 100%; height: 700px; position: relative; -webkit-tap-highlight-color: rgba(255, 255, 255, 0); cursor: auto;"><canvas tabindex="0" width="1229" height="681" style="position: absolute; top: 0px; left: 0px; z-index: 2; user-select: none; touch-action: none; width: 1229px; height: 681px; cursor: auto;">This text is displayed if your browser does not support the Canvas HTML element.</canvas><div style="position: absolute; overflow: auto; width: 1246px; height: 698px; z-index: 1;"><div style="position: absolute; width: 3433.65px; height: 1590.37px;"></div></div></div>
  <div id="myOverviewDiv" style="-webkit-tap-highlight-color: rgba(255, 255, 255, 0);"><canvas tabindex="0" width="198" height="98" style="position: absolute; top: 0px; left: 0px; z-index: 2; user-select: none; touch-action: none; width: 198px; height: 98px;">This text is displayed if your browser does not support the Canvas HTML element.</canvas><div style="position: absolute; overflow: auto; width: 198px; height: 98px; z-index: 1;"><div style="position: absolute; width: 1px; height: 1px;"></div></div></div> <!-- Styled in a <style> tag at the top of the html page -->
  <p>
  This sample shows an organizational chart diagram and uses an in-laid GoJS <a href="../api/symbols/Overview.html" target="api">Overview</a> to aid the user in navigation.
  The diagram uses a <a href="../api/symbols/TreeLayout.html" target="api">TreeLayout</a> featuring <a href="../api/symbols/TreeLayout.html#static-StyleLastParents" target="api">TreeLayout.StyleLastParents</a> to allow for different alignments on the last parents.
  The data was taken from the UN web site in August 2009.
  </p>
  <p>
  A search box demonstrates one way of finding and highlighting nodes whose data includes particular strings.
  Note that one can see all of the highlighted nodes in the Overview.
  </p>
  <input type="search" id="mySearch" onkeypress="if (event.keyCode === 13) searchDiagram()">
  <button onclick="searchDiagram()">Search</button>
  <p>
    To learn how to build an org chart from scratch with GoJS, see the <a href="../learn/index.html">Getting Started tutorial</a>.
  </p>
  <p>
    If you want to have some "assistant" nodes on the side, above the regular reports,
    see the <a href="orgChartAssistants.html">Org Chart Assistants</a> sample, which is a copy of this sample
    that uses a custom <a href="../api/symbols/TreeLayout.html" target="api">TreeLayout</a> to position "assistants" that way.
  </p>
  <p>
    Flag images are from <a href="https://openmoji.org/">OpenMoji</a> – the open-source emoji and icon project. License: CC BY-SA 4.0.
  </p>
<p class="text-xs">GoJS version 2.2.4. Copyright 1998-2022 by Northwoods Software.</p></div>
    <p><a href="https://github.com/NorthwoodsSoftware/GoJS/blob/master/samples/orgChartStatic.html" target="_blank">View this sample page's source on GitHub</a></p><pre class=" language-js">
    <span class="token keyword">function</span> <span class="token function">init</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>

      <span class="token comment">// Since 2.2 you can also author concise templates with method chaining instead of GraphObject.make</span>
      <span class="token comment">// For details, see https://gojs.net/latest/intro/buildingObjects.html</span>
      <span class="token keyword">const</span> $ <span class="token operator">=</span> go<span class="token punctuation">.</span>GraphObject<span class="token punctuation">.</span>make<span class="token punctuation">;</span>  <span class="token comment">// for conciseness in defining templates</span>

      <span class="token comment">// some constants that will be reused within templates</span>
      <span class="token keyword">var</span> mt8 <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Margin</span><span class="token punctuation">(</span><span class="token number">8</span><span class="token punctuation">,</span> <span class="token number">0</span><span class="token punctuation">,</span> <span class="token number">0</span><span class="token punctuation">,</span> <span class="token number">0</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
      <span class="token keyword">var</span> mr8 <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Margin</span><span class="token punctuation">(</span><span class="token number">0</span><span class="token punctuation">,</span> <span class="token number">8</span><span class="token punctuation">,</span> <span class="token number">0</span><span class="token punctuation">,</span> <span class="token number">0</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
      <span class="token keyword">var</span> ml8 <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Margin</span><span class="token punctuation">(</span><span class="token number">0</span><span class="token punctuation">,</span> <span class="token number">0</span><span class="token punctuation">,</span> <span class="token number">0</span><span class="token punctuation">,</span> <span class="token number">8</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
      <span class="token keyword">var</span> roundedRectangleParams <span class="token operator">=</span> <span class="token punctuation">{</span>
        parameter1<span class="token operator">:</span> <span class="token number">2</span><span class="token punctuation">,</span>  <span class="token comment">// set the rounded corner</span>
        spot1<span class="token operator">:</span> go<span class="token punctuation">.</span>Spot<span class="token punctuation">.</span>TopLeft<span class="token punctuation">,</span> spot2<span class="token operator">:</span> go<span class="token punctuation">.</span>Spot<span class="token punctuation">.</span>BottomRight  <span class="token comment">// make content go all the way to inside edges of rounded corners</span>
      <span class="token punctuation">}</span><span class="token punctuation">;</span>

      myDiagram <span class="token operator">=</span>
        <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>Diagram<span class="token punctuation">,</span> <span class="token string">"myDiagramDiv"</span><span class="token punctuation">,</span>  <span class="token comment">// the DIV HTML element</span>
          <span class="token punctuation">{</span>
            <span class="token comment">// Put the diagram contents at the top center of the viewport</span>
            initialDocumentSpot<span class="token operator">:</span> go<span class="token punctuation">.</span>Spot<span class="token punctuation">.</span>Top<span class="token punctuation">,</span>
            initialViewportSpot<span class="token operator">:</span> go<span class="token punctuation">.</span>Spot<span class="token punctuation">.</span>Top<span class="token punctuation">,</span>
            <span class="token comment">// OR: Scroll to show a particular node, once the layout has determined where that node is</span>
            <span class="token comment">// "InitialLayoutCompleted": e =&gt; {</span>
            <span class="token comment">//  var node = e.diagram.findNodeForKey(28);</span>
            <span class="token comment">//  if (node !== null) e.diagram.commandHandler.scrollToPart(node);</span>
            <span class="token comment">// },</span>
            layout<span class="token operator">:</span>
              <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>TreeLayout<span class="token punctuation">,</span>  <span class="token comment">// use a TreeLayout to position all of the nodes</span>
                <span class="token punctuation">{</span>
                  isOngoing<span class="token operator">:</span> <span class="token boolean">false</span><span class="token punctuation">,</span>  <span class="token comment">// don't relayout when expanding/collapsing panels</span>
                  treeStyle<span class="token operator">:</span> go<span class="token punctuation">.</span>TreeLayout<span class="token punctuation">.</span>StyleLastParents<span class="token punctuation">,</span>
                  <span class="token comment">// properties for most of the tree:</span>
                  angle<span class="token operator">:</span> <span class="token number">90</span><span class="token punctuation">,</span>
                  layerSpacing<span class="token operator">:</span> <span class="token number">80</span><span class="token punctuation">,</span>
                  <span class="token comment">// properties for the "last parents":</span>
                  alternateAngle<span class="token operator">:</span> <span class="token number">0</span><span class="token punctuation">,</span>
                  alternateAlignment<span class="token operator">:</span> go<span class="token punctuation">.</span>TreeLayout<span class="token punctuation">.</span>AlignmentStart<span class="token punctuation">,</span>
                  alternateNodeIndent<span class="token operator">:</span> <span class="token number">15</span><span class="token punctuation">,</span>
                  alternateNodeIndentPastParent<span class="token operator">:</span> <span class="token number">1</span><span class="token punctuation">,</span>
                  alternateNodeSpacing<span class="token operator">:</span> <span class="token number">15</span><span class="token punctuation">,</span>
                  alternateLayerSpacing<span class="token operator">:</span> <span class="token number">40</span><span class="token punctuation">,</span>
                  alternateLayerSpacingParentOverlap<span class="token operator">:</span> <span class="token number">1</span><span class="token punctuation">,</span>
                  alternatePortSpot<span class="token operator">:</span> <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Spot</span><span class="token punctuation">(</span><span class="token number">0.001</span><span class="token punctuation">,</span> <span class="token number">1</span><span class="token punctuation">,</span> <span class="token number">20</span><span class="token punctuation">,</span> <span class="token number">0</span><span class="token punctuation">)</span><span class="token punctuation">,</span>
                  alternateChildPortSpot<span class="token operator">:</span> go<span class="token punctuation">.</span>Spot<span class="token punctuation">.</span>Left
                <span class="token punctuation">}</span><span class="token punctuation">)</span>
          <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

      <span class="token comment">// This function provides a common style for most of the TextBlocks.</span>
      <span class="token comment">// Some of these values may be overridden in a particular TextBlock.</span>
      <span class="token keyword">function</span> <span class="token function">textStyle</span><span class="token punctuation">(</span><span class="token parameter">field</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token punctuation">[</span>
          <span class="token punctuation">{</span>
            font<span class="token operator">:</span> <span class="token string">"12px Roboto, sans-serif"</span><span class="token punctuation">,</span> stroke<span class="token operator">:</span> <span class="token string">"rgba(0, 0, 0, .60)"</span><span class="token punctuation">,</span>
            visible<span class="token operator">:</span> <span class="token boolean">false</span>  <span class="token comment">// only show textblocks when there is corresponding data for them</span>
          <span class="token punctuation">}</span><span class="token punctuation">,</span>
          <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Binding</span><span class="token punctuation">(</span><span class="token string">"visible"</span><span class="token punctuation">,</span> field<span class="token punctuation">,</span> <span class="token parameter">val</span> <span class="token operator">=&gt;</span> val <span class="token operator">!==</span> <span class="token keyword">undefined</span><span class="token punctuation">)</span>
        <span class="token punctuation">]</span><span class="token punctuation">;</span>
      <span class="token punctuation">}</span>

      <span class="token comment">// define Converters to be used for Bindings</span>
      <span class="token keyword">function</span> <span class="token function">theNationFlagConverter</span><span class="token punctuation">(</span><span class="token parameter">nation</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token string">"https://www.nwoods.com/images/emojiflags/"</span> <span class="token operator">+</span> nation <span class="token operator">+</span> <span class="token string">".png"</span><span class="token punctuation">;</span>
      <span class="token punctuation">}</span>

      <span class="token comment">// define the Node template</span>
      myDiagram<span class="token punctuation">.</span>nodeTemplate <span class="token operator">=</span>
        <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>Node<span class="token punctuation">,</span> <span class="token string">"Auto"</span><span class="token punctuation">,</span>
          <span class="token punctuation">{</span>
            locationSpot<span class="token operator">:</span> go<span class="token punctuation">.</span>Spot<span class="token punctuation">.</span>Top<span class="token punctuation">,</span>
            isShadowed<span class="token operator">:</span> <span class="token boolean">true</span><span class="token punctuation">,</span> shadowBlur<span class="token operator">:</span> <span class="token number">1</span><span class="token punctuation">,</span>
            shadowOffset<span class="token operator">:</span> <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Point</span><span class="token punctuation">(</span><span class="token number">0</span><span class="token punctuation">,</span> <span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">,</span>
            shadowColor<span class="token operator">:</span> <span class="token string">"rgba(0, 0, 0, .14)"</span><span class="token punctuation">,</span>
            selectionAdornmentTemplate<span class="token operator">:</span>  <span class="token comment">// selection adornment to match shape of nodes</span>
              <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>Adornment<span class="token punctuation">,</span> <span class="token string">"Auto"</span><span class="token punctuation">,</span>
                <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>Shape<span class="token punctuation">,</span> <span class="token string">"RoundedRectangle"</span><span class="token punctuation">,</span> roundedRectangleParams<span class="token punctuation">,</span>
                  <span class="token punctuation">{</span> fill<span class="token operator">:</span> <span class="token keyword">null</span><span class="token punctuation">,</span> stroke<span class="token operator">:</span> <span class="token string">"#7986cb"</span><span class="token punctuation">,</span> strokeWidth<span class="token operator">:</span> <span class="token number">3</span> <span class="token punctuation">}</span>
                <span class="token punctuation">)</span><span class="token punctuation">,</span>
                <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>Placeholder<span class="token punctuation">)</span>
              <span class="token punctuation">)</span>  <span class="token comment">// end Adornment</span>
          <span class="token punctuation">}</span><span class="token punctuation">,</span>
          <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>Shape<span class="token punctuation">,</span> <span class="token string">"RoundedRectangle"</span><span class="token punctuation">,</span> roundedRectangleParams<span class="token punctuation">,</span>
            <span class="token punctuation">{</span> name<span class="token operator">:</span> <span class="token string">"SHAPE"</span><span class="token punctuation">,</span> fill<span class="token operator">:</span> <span class="token string">"#ffffff"</span><span class="token punctuation">,</span> strokeWidth<span class="token operator">:</span> <span class="token number">0</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
            <span class="token comment">// gold if highlighted, white otherwise</span>
            <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Binding</span><span class="token punctuation">(</span><span class="token string">"fill"</span><span class="token punctuation">,</span> <span class="token string">"isHighlighted"</span><span class="token punctuation">,</span> <span class="token parameter">h</span> <span class="token operator">=&gt;</span> h <span class="token operator">?</span> <span class="token string">"gold"</span> <span class="token operator">:</span> <span class="token string">"#ffffff"</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">ofObject</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
          <span class="token punctuation">)</span><span class="token punctuation">,</span>
          <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>Panel<span class="token punctuation">,</span> <span class="token string">"Vertical"</span><span class="token punctuation">,</span>
            <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>Panel<span class="token punctuation">,</span> <span class="token string">"Horizontal"</span><span class="token punctuation">,</span>
              <span class="token punctuation">{</span> margin<span class="token operator">:</span> <span class="token number">8</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
              <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>Picture<span class="token punctuation">,</span>  <span class="token comment">// flag image, only visible if a nation is specified</span>
                <span class="token punctuation">{</span> margin<span class="token operator">:</span> mr8<span class="token punctuation">,</span> visible<span class="token operator">:</span> <span class="token boolean">false</span><span class="token punctuation">,</span> desiredSize<span class="token operator">:</span> <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Size</span><span class="token punctuation">(</span><span class="token number">50</span><span class="token punctuation">,</span> <span class="token number">50</span><span class="token punctuation">)</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
                <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Binding</span><span class="token punctuation">(</span><span class="token string">"source"</span><span class="token punctuation">,</span> <span class="token string">"nation"</span><span class="token punctuation">,</span> theNationFlagConverter<span class="token punctuation">)</span><span class="token punctuation">,</span>
                <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Binding</span><span class="token punctuation">(</span><span class="token string">"visible"</span><span class="token punctuation">,</span> <span class="token string">"nation"</span><span class="token punctuation">,</span> <span class="token parameter">nat</span> <span class="token operator">=&gt;</span> nat <span class="token operator">!==</span> <span class="token keyword">undefined</span><span class="token punctuation">)</span>
              <span class="token punctuation">)</span><span class="token punctuation">,</span>
              <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>Panel<span class="token punctuation">,</span> <span class="token string">"Table"</span><span class="token punctuation">,</span>
                <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>TextBlock<span class="token punctuation">,</span>
                  <span class="token punctuation">{</span>
                    row<span class="token operator">:</span> <span class="token number">0</span><span class="token punctuation">,</span> alignment<span class="token operator">:</span> go<span class="token punctuation">.</span>Spot<span class="token punctuation">.</span>Left<span class="token punctuation">,</span>
                    font<span class="token operator">:</span> <span class="token string">"16px Roboto, sans-serif"</span><span class="token punctuation">,</span>
                    stroke<span class="token operator">:</span> <span class="token string">"rgba(0, 0, 0, .87)"</span><span class="token punctuation">,</span>
                    maxSize<span class="token operator">:</span> <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Size</span><span class="token punctuation">(</span><span class="token number">160</span><span class="token punctuation">,</span> <span class="token number">NaN</span><span class="token punctuation">)</span>
                  <span class="token punctuation">}</span><span class="token punctuation">,</span>
                  <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Binding</span><span class="token punctuation">(</span><span class="token string">"text"</span><span class="token punctuation">,</span> <span class="token string">"name"</span><span class="token punctuation">)</span>
                <span class="token punctuation">)</span><span class="token punctuation">,</span>
                <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>TextBlock<span class="token punctuation">,</span> <span class="token function">textStyle</span><span class="token punctuation">(</span><span class="token string">"title"</span><span class="token punctuation">)</span><span class="token punctuation">,</span>
                  <span class="token punctuation">{</span>
                    row<span class="token operator">:</span> <span class="token number">1</span><span class="token punctuation">,</span> alignment<span class="token operator">:</span> go<span class="token punctuation">.</span>Spot<span class="token punctuation">.</span>Left<span class="token punctuation">,</span>
                    maxSize<span class="token operator">:</span> <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Size</span><span class="token punctuation">(</span><span class="token number">160</span><span class="token punctuation">,</span> <span class="token number">NaN</span><span class="token punctuation">)</span>
                  <span class="token punctuation">}</span><span class="token punctuation">,</span>
                  <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Binding</span><span class="token punctuation">(</span><span class="token string">"text"</span><span class="token punctuation">,</span> <span class="token string">"title"</span><span class="token punctuation">)</span>
                <span class="token punctuation">)</span><span class="token punctuation">,</span>
                <span class="token function">$</span><span class="token punctuation">(</span><span class="token string">"PanelExpanderButton"</span><span class="token punctuation">,</span> <span class="token string">"INFO"</span><span class="token punctuation">,</span>
                  <span class="token punctuation">{</span> row<span class="token operator">:</span> <span class="token number">0</span><span class="token punctuation">,</span> column<span class="token operator">:</span> <span class="token number">1</span><span class="token punctuation">,</span> rowSpan<span class="token operator">:</span> <span class="token number">2</span><span class="token punctuation">,</span> margin<span class="token operator">:</span> ml8 <span class="token punctuation">}</span>
                <span class="token punctuation">)</span>
              <span class="token punctuation">)</span>
            <span class="token punctuation">)</span><span class="token punctuation">,</span>
            <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>Shape<span class="token punctuation">,</span> <span class="token string">"LineH"</span><span class="token punctuation">,</span>
              <span class="token punctuation">{</span>
                stroke<span class="token operator">:</span> <span class="token string">"rgba(0, 0, 0, .60)"</span><span class="token punctuation">,</span> strokeWidth<span class="token operator">:</span> <span class="token number">1</span><span class="token punctuation">,</span>
                height<span class="token operator">:</span> <span class="token number">1</span><span class="token punctuation">,</span> stretch<span class="token operator">:</span> go<span class="token punctuation">.</span>GraphObject<span class="token punctuation">.</span>Horizontal
              <span class="token punctuation">}</span><span class="token punctuation">,</span>
              <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Binding</span><span class="token punctuation">(</span><span class="token string">"visible"</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">ofObject</span><span class="token punctuation">(</span><span class="token string">"INFO"</span><span class="token punctuation">)</span>  <span class="token comment">// only visible when info is expanded</span>
            <span class="token punctuation">)</span><span class="token punctuation">,</span>
            <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>Panel<span class="token punctuation">,</span> <span class="token string">"Vertical"</span><span class="token punctuation">,</span>
              <span class="token punctuation">{</span>
                name<span class="token operator">:</span> <span class="token string">"INFO"</span><span class="token punctuation">,</span>  <span class="token comment">// identify to the PanelExpanderButton</span>
                stretch<span class="token operator">:</span> go<span class="token punctuation">.</span>GraphObject<span class="token punctuation">.</span>Horizontal<span class="token punctuation">,</span>  <span class="token comment">// take up whole available width</span>
                margin<span class="token operator">:</span> <span class="token number">8</span><span class="token punctuation">,</span>
                defaultAlignment<span class="token operator">:</span> go<span class="token punctuation">.</span>Spot<span class="token punctuation">.</span>Left<span class="token punctuation">,</span>  <span class="token comment">// thus no need to specify alignment on each element</span>
              <span class="token punctuation">}</span><span class="token punctuation">,</span>
              <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>TextBlock<span class="token punctuation">,</span> <span class="token function">textStyle</span><span class="token punctuation">(</span><span class="token string">"headOf"</span><span class="token punctuation">)</span><span class="token punctuation">,</span>
                <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Binding</span><span class="token punctuation">(</span><span class="token string">"text"</span><span class="token punctuation">,</span> <span class="token string">"headOf"</span><span class="token punctuation">,</span> <span class="token parameter">head</span> <span class="token operator">=&gt;</span> <span class="token string">"Head of: "</span> <span class="token operator">+</span> head<span class="token punctuation">)</span>
              <span class="token punctuation">)</span><span class="token punctuation">,</span>
              <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>TextBlock<span class="token punctuation">,</span> <span class="token function">textStyle</span><span class="token punctuation">(</span><span class="token string">"boss"</span><span class="token punctuation">)</span><span class="token punctuation">,</span>
                <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Binding</span><span class="token punctuation">(</span><span class="token string">"margin"</span><span class="token punctuation">,</span> <span class="token string">"headOf"</span><span class="token punctuation">,</span> <span class="token parameter">head</span> <span class="token operator">=&gt;</span> mt8<span class="token punctuation">)</span><span class="token punctuation">,</span> <span class="token comment">// some space above if there is also a headOf value</span>
                <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>Binding</span><span class="token punctuation">(</span><span class="token string">"text"</span><span class="token punctuation">,</span> <span class="token string">"boss"</span><span class="token punctuation">,</span> <span class="token parameter">boss</span> <span class="token operator">=&gt;</span> <span class="token punctuation">{</span>
                  <span class="token keyword">var</span> boss <span class="token operator">=</span> myDiagram<span class="token punctuation">.</span>model<span class="token punctuation">.</span><span class="token function">findNodeDataForKey</span><span class="token punctuation">(</span>boss<span class="token punctuation">)</span><span class="token punctuation">;</span>
                  <span class="token keyword">if</span> <span class="token punctuation">(</span>boss <span class="token operator">!==</span> <span class="token keyword">null</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
                    <span class="token keyword">return</span> <span class="token string">"Reporting to: "</span> <span class="token operator">+</span> boss<span class="token punctuation">.</span>name<span class="token punctuation">;</span>
                  <span class="token punctuation">}</span>
                  <span class="token keyword">return</span> <span class="token string">""</span><span class="token punctuation">;</span>
                <span class="token punctuation">}</span><span class="token punctuation">)</span>
              <span class="token punctuation">)</span>
            <span class="token punctuation">)</span>
          <span class="token punctuation">)</span>
        <span class="token punctuation">)</span><span class="token punctuation">;</span>

      <span class="token comment">// define the Link template, a simple orthogonal line</span>
      myDiagram<span class="token punctuation">.</span>linkTemplate <span class="token operator">=</span>
        <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>Link<span class="token punctuation">,</span> go<span class="token punctuation">.</span>Link<span class="token punctuation">.</span>Orthogonal<span class="token punctuation">,</span>
          <span class="token punctuation">{</span> corner<span class="token operator">:</span> <span class="token number">5</span><span class="token punctuation">,</span> selectable<span class="token operator">:</span> <span class="token boolean">false</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
          <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>Shape<span class="token punctuation">,</span> <span class="token punctuation">{</span> strokeWidth<span class="token operator">:</span> <span class="token number">3</span><span class="token punctuation">,</span> stroke<span class="token operator">:</span> <span class="token string">"#424242"</span> <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span>  <span class="token comment">// dark gray, rounded corner links</span>


      <span class="token comment">// set up the nodeDataArray, describing each person/position</span>
      <span class="token keyword">var</span> nodeDataArray <span class="token operator">=</span> <span class="token punctuation">[</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">0</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Ban Ki-moon 반기문"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"SouthKorea"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Secretary-General of the United Nations"</span><span class="token punctuation">,</span> headOf<span class="token operator">:</span> <span class="token string">"Secretariat"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">1</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">0</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Patricia O'Brien"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Ireland"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Under-Secretary-General for Legal Affairs and United Nations Legal Counsel"</span><span class="token punctuation">,</span> headOf<span class="token operator">:</span> <span class="token string">"Office of Legal Affairs"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">3</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">1</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Peter Taksøe-Jensen"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Denmark"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Assistant Secretary-General for Legal Affairs"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">9</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">3</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Other Employees"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">4</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">1</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Maria R. Vicien - Milburn"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Argentina"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"General Legal Division Director"</span><span class="token punctuation">,</span> headOf<span class="token operator">:</span> <span class="token string">"General Legal Division"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">10</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">4</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Other Employees"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">5</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">1</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Václav Mikulka"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"CzechRepublic"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Codification Division Director"</span><span class="token punctuation">,</span> headOf<span class="token operator">:</span> <span class="token string">"Codification Division"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">11</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">5</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Other Employees"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">6</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">1</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Sergei Tarassenko"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Russia"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Division for Ocean Affairs and the Law of the Sea Director"</span><span class="token punctuation">,</span> headOf<span class="token operator">:</span> <span class="token string">"Division for Ocean Affairs and the Law of the Sea"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">12</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">6</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Alexandre Tagore Medeiros de Albuquerque"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Brazil"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Chairman of the Commission on the Limits of the Continental Shelf"</span><span class="token punctuation">,</span> headOf<span class="token operator">:</span> <span class="token string">"The Commission on the Limits of the Continental Shelf"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">17</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">12</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Peter F. Croker"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Ireland"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Chairman of the Committee on Confidentiality"</span><span class="token punctuation">,</span> headOf<span class="token operator">:</span> <span class="token string">"The Committee on Confidentiality"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">31</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">17</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Michael Anselme Marc Rosette"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Seychelles"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Vice Chairman of the Committee on Confidentiality"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">32</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">17</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Kensaku Tamaki"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Japan"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Vice Chairman of the Committee on Confidentiality"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">33</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">17</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Osvaldo Pedro Astiz"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Argentina"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Member of the Committee on Confidentiality"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">34</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">17</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Yuri Borisovitch Kazmin"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Russia"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Member of the Committee on Confidentiality"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">18</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">12</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Philip Alexander Symonds"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Australia"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Chairman of the Committee on provision of scientific and technical advice to coastal States"</span><span class="token punctuation">,</span> headOf<span class="token operator">:</span> <span class="token string">"Committee on provision of scientific and technical advice to coastal States"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">35</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">18</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Emmanuel Kalngui"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Cameroon"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Vice Chairman of the Committee on provision of scientific and technical advice to coastal States"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">36</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">18</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Sivaramakrishnan Rajan"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"India"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Vice Chairman of the Committee on provision of scientific and technical advice to coastal States"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">37</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">18</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Francis L. Charles"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"TrinidadAndTobago"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Member of the Committee on provision of scientific and technical advice to costal States"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">38</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">18</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Mihai Silviu German"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Romania"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Member of the Committee on provision of scientific and technical advice to costal States"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">19</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">12</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Lawrence Folajimi Awosika"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Nigeria"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Vice Chairman of the Commission on the Limits of the Continental Shelf"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">20</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">12</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Harald Brekke"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Norway"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Vice Chairman of the Commission on the Limits of the Continental Shelf"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">21</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">12</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Yong-Ahn Park"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"SouthKorea"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Vice Chairman of the Commission on the Limits of the Continental Shelf"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">22</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">12</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Abu Bakar Jaafar"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Malaysia"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Chairman of the Editorial Committee"</span><span class="token punctuation">,</span> headOf<span class="token operator">:</span> <span class="token string">"Editorial Committee"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">23</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">12</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Galo Carrera Hurtado"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Mexico"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Chairman of the Training Committee"</span><span class="token punctuation">,</span> headOf<span class="token operator">:</span> <span class="token string">"Training Committee"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">24</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">12</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Indurlall Fagoonee"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Mauritius"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Member of the Commission on the Limits of the Continental Shelf"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">25</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">12</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"George Jaoshvili"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Georgia"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Member of the Commission on the Limits of the Continental Shelf"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">26</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">12</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Wenzhang Lu"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"China"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Member of the Commission on the Limits of the Continental Shelf"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">27</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">12</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Isaac Owusu Orudo"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Ghana"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Member of the Commission on the Limits of the Continental Shelf"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">28</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">12</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Fernando Manuel Maia Pimentel"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Portugal"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Member of the Commission on the Limits of the Continental Shelf"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">7</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">1</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Renaud Sorieul"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"France"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"International Trade Law Division Director"</span><span class="token punctuation">,</span> headOf<span class="token operator">:</span> <span class="token string">"International Trade Law Division"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">13</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">7</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Other Employees"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">8</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">1</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Annebeth Rosenboom"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Netherlands"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Treaty Section Chief"</span><span class="token punctuation">,</span> headOf<span class="token operator">:</span> <span class="token string">"Treaty Section"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">14</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">8</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Bradford Smith"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"UnitedStates"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Substantive Legal Issues Head"</span><span class="token punctuation">,</span> headOf<span class="token operator">:</span> <span class="token string">"Substantive Legal Issues"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">29</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">14</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Other Employees"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">15</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">8</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Andrei Kolomoets"</span><span class="token punctuation">,</span> nation<span class="token operator">:</span> <span class="token string">"Russia"</span><span class="token punctuation">,</span> title<span class="token operator">:</span> <span class="token string">"Technical/Legal Issues Head"</span><span class="token punctuation">,</span> headOf<span class="token operator">:</span> <span class="token string">"Technical/Legal Issues"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">30</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">15</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Other Employees"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">16</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">8</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Other Employees"</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
        <span class="token punctuation">{</span> key<span class="token operator">:</span> <span class="token number">2</span><span class="token punctuation">,</span> boss<span class="token operator">:</span> <span class="token number">0</span><span class="token punctuation">,</span> name<span class="token operator">:</span> <span class="token string">"Heads of Other Offices/Departments"</span> <span class="token punctuation">}</span>
      <span class="token punctuation">]</span><span class="token punctuation">;</span>

      <span class="token comment">// create the Model with data for the tree, and assign to the Diagram</span>
      myDiagram<span class="token punctuation">.</span>model <span class="token operator">=</span>
        <span class="token keyword">new</span> <span class="token class-name">go<span class="token punctuation">.</span>TreeModel</span><span class="token punctuation">(</span>
          <span class="token punctuation">{</span>
            nodeParentKeyProperty<span class="token operator">:</span> <span class="token string">"boss"</span><span class="token punctuation">,</span>  <span class="token comment">// this property refers to the parent node data</span>
            nodeDataArray<span class="token operator">:</span> nodeDataArray
          <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

      <span class="token comment">// Overview</span>
      myOverview <span class="token operator">=</span>
        <span class="token function">$</span><span class="token punctuation">(</span>go<span class="token punctuation">.</span>Overview<span class="token punctuation">,</span> <span class="token string">"myOverviewDiv"</span><span class="token punctuation">,</span>  <span class="token comment">// the HTML DIV element for the Overview</span>
          <span class="token punctuation">{</span> observed<span class="token operator">:</span> myDiagram<span class="token punctuation">,</span> contentAlignment<span class="token operator">:</span> go<span class="token punctuation">.</span>Spot<span class="token punctuation">.</span>Center <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>   <span class="token comment">// tell it which Diagram to show and pan</span>
    <span class="token punctuation">}</span>

    <span class="token comment">// the Search functionality highlights all of the nodes that have at least one data property match a RegExp</span>
    <span class="token keyword">function</span> <span class="token function">searchDiagram</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>  <span class="token comment">// called by button</span>
      <span class="token keyword">var</span> input <span class="token operator">=</span> document<span class="token punctuation">.</span><span class="token function">getElementById</span><span class="token punctuation">(</span><span class="token string">"mySearch"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
      <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token operator">!</span>input<span class="token punctuation">)</span> <span class="token keyword">return</span><span class="token punctuation">;</span>
      myDiagram<span class="token punctuation">.</span><span class="token function">focus</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

      myDiagram<span class="token punctuation">.</span><span class="token function">startTransaction</span><span class="token punctuation">(</span><span class="token string">"highlight search"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

      <span class="token keyword">if</span> <span class="token punctuation">(</span>input<span class="token punctuation">.</span>value<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        <span class="token comment">// search four different data properties for the string, any of which may match for success</span>
        <span class="token comment">// create a case insensitive RegExp from what the user typed</span>
        <span class="token keyword">var</span> safe <span class="token operator">=</span> input<span class="token punctuation">.</span>value<span class="token punctuation">.</span><span class="token function">replace</span><span class="token punctuation">(</span><span class="token regex"><span class="token regex-delimiter">/</span><span class="token regex-source language-regex">[.*+?^${}()|[\]\\]</span><span class="token regex-delimiter">/</span><span class="token regex-flags">g</span></span><span class="token punctuation">,</span> <span class="token string">'\\$&amp;'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token keyword">var</span> regex <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">RegExp</span><span class="token punctuation">(</span>safe<span class="token punctuation">,</span> <span class="token string">"i"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token keyword">var</span> results <span class="token operator">=</span> myDiagram<span class="token punctuation">.</span><span class="token function">findNodesByExample</span><span class="token punctuation">(</span><span class="token punctuation">{</span> name<span class="token operator">:</span> regex <span class="token punctuation">}</span><span class="token punctuation">,</span>
          <span class="token punctuation">{</span> nation<span class="token operator">:</span> regex <span class="token punctuation">}</span><span class="token punctuation">,</span>
          <span class="token punctuation">{</span> title<span class="token operator">:</span> regex <span class="token punctuation">}</span><span class="token punctuation">,</span>
          <span class="token punctuation">{</span> headOf<span class="token operator">:</span> regex <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        myDiagram<span class="token punctuation">.</span><span class="token function">highlightCollection</span><span class="token punctuation">(</span>results<span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token comment">// try to center the diagram at the first node that was found</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span>results<span class="token punctuation">.</span>count <span class="token operator">&gt;</span> <span class="token number">0</span><span class="token punctuation">)</span> myDiagram<span class="token punctuation">.</span><span class="token function">centerRect</span><span class="token punctuation">(</span>results<span class="token punctuation">.</span><span class="token function">first</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">.</span>actualBounds<span class="token punctuation">)</span><span class="token punctuation">;</span>
      <span class="token punctuation">}</span> <span class="token keyword">else</span> <span class="token punctuation">{</span>  <span class="token comment">// empty string only clears highlighteds collection</span>
        myDiagram<span class="token punctuation">.</span><span class="token function">clearHighlighteds</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
      <span class="token punctuation">}</span>

      myDiagram<span class="token punctuation">.</span><span class="token function">commitTransaction</span><span class="token punctuation">(</span><span class="token string">"highlight search"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
    <span class="token punctuation">}</span>
    window<span class="token punctuation">.</span><span class="token function">addEventListener</span><span class="token punctuation">(</span><span class="token string">'DOMContentLoaded'</span><span class="token punctuation">,</span> init<span class="token punctuation">)</span><span class="token punctuation">;</span>
  </pre></div>

</script>