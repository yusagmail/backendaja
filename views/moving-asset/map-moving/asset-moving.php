<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Beacons';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php /*
    <script src="js/jquery.enhsplitter.js"></script>
    <link href="css/jquery.enhsplitter.css" rel="stylesheet"/>
*/ ?>

<?php
//$this->registerCssFile("@web/plugins/fancybox/jquery.fancybox.css", ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('@web/splitter/js/jquery.enhsplitter.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile("@web/splitter/css/jquery.enhsplitter.css", ['position' => \yii\web\View::POS_HEAD]);
?>

<?php

?>

<div class="">
        
    <?php 
    $labelDetail = 'Point';
    $jsonFilename = \backend\models\PointSearch::generateFileGeojson();
    echo $jsonFilename;

    $iconName = "marker1.png";
    $iconScale = 0.5; //Scale standard untuk marker

    echo $this->render('/globalmap/_main_map_for_point', [
        'jsonFilename' => $jsonFilename,
        'iconName' => $iconName,
        'iconScale' => $iconScale,
        'labelDetail' => $labelDetail,
        'mapstyle' => $mapstyle
        //'searchModel' => $searchModel,
        //'dataProvider' => $dataProvider,
    ]) ?>

    <?php 
    $jsonFilenamePath = \backend\models\PolylineSearch::generateFileGeojsonPoly();
    echo $this->render('_load_data_path', [
      'labelDetail' => $labelDetail,
      'jsonFilenamePath' => $jsonFilenamePath,
    ]);
    ?>

    <?php 
    //echo $this->render('/globalmap/__load_main_data', [
    echo $this->render('_load_data_point_sta', [
      'labelDetail' => $labelDetail,
    ]);
    ?>

    <?php 
    $jsonFilenameAsset = \backend\models\SensorSearch::generateFileGeojson();
    echo $this->render('_load_data_asset', [
      'jsonFilenameAsset' => $jsonFilenameAsset,
      'labelDetail' => $labelDetail,

    ]);
    ?>

    <?php  echo $this->render('/global/_fancybox_dialog', [
    ]) ?>
    <?php
    $searchModel = new \backend\models\PointSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    ?>
            <div id="mydiv" class="box">
              <!-- Include a header DIV with the same name as the draggable DIV, followed by "header" -->

                <div class="box-header with-border" id="mydivheader">
                    <h3 class="box-title">List Asset<span id="alertMsg" class="alertMsg"></span></h3> 
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <?php /*
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> */ ?>
                    </div>
                </div>
              <div class="box-body">
        <?php 
            if($clearall){
                $clearall = true; 
                //echo "clear";
            }else{
                $clearall = false;
                //echo "all";
            }
        ?>
                <?php 
                $searchModelAsset = new \backend\models\SensorSearch();
                $dataProviderAsset = $searchModelAsset->search(Yii::$app->request->queryParams);
                echo $this->render('index-panel-asset', [
                    'searchModel' => $searchModelAsset,
                    'dataProvider' => $dataProviderAsset,
                    'defaultClear' => $clearall
                ]) ?>
                </div>
            </div>

            <div id="mydiv2" class="box" style="display:none">
              <!-- Include a header DIV with the same name as the draggable DIV, followed by "header" -->
              <div class="box-header with-border" id="mydiv2header">
                    <h3 class="box-title">Add Point</h3>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" onclick="showAddPanel()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
              <div class="box-body">
                <div class="overflow-x: auto; width: 100%;">
                  <?php
                  $model = new \backend\models\Point();

                  if ($model->load(Yii::$app->request->post()) && $model->save()) {
                      Yii::$app->response->redirect(['cview', 'id' => $model->id_point]);
                  }
                  ?>
                  <?= $this->render('create', [
                      'model' => $model,
                  ]) ?>

                  </div>
              </div>
            </div>

            <div id="mydiv3" class="box" style="display:none">
              <!-- Include a header DIV with the same name as the draggable DIV, followed by "header" -->
              <div class="box-header with-border" id="mydiv3header">
                    <h3 class="box-title">Update Point</h3>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" onclick="showUpdatePanel()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
              <div class="box-body">
                <div class="overflow-x: auto; width: 100%;">
                  <?php
                  $model = new \backend\models\Point();

                  if ($model->load(Yii::$app->request->post()) && $model->save()) {
                      Yii::$app->response->redirect(['cview', 'id' => $model->id_point]);
                  }
                  ?>
                  <?= $this->render('update', [
                      'model' => $model,
                  ]) ?>
                  </div>
              </div>
            </div>
    </div>


<?php
$this->registerJs(
    "  
    jQuery(function ($) {
        $('#areaOne').enhsplitter({minSize: 50, vertical: true, position: '70%'});

    });
    "
);
?>

<style>
#mydiv {
  position: absolute;
  right:10px;
  top:  60px;
  z-index: 9;
  background-color: #f1f1f1;
  border: 1px solid #d3d3d3;
  text-align: left;
  width: 400px;
  padding-bottom: 0px;
}
#mydiv2 {
  position: absolute;
  left:120px;
  z-index: 11;
  background-color: #f1f1f1;
  border: 1px solid #d3d3d3;
  text-align: left;
  width: 400px;
}
#mydiv3 {
  position: absolute;
  left:180px;
  top:  60px;
  z-index: 9;
  background-color: #f1f1f1;
  border: 1px solid #d3d3d3;
  text-align: left;
  width: 400px;
}

#mydivheader {
  padding: 7px;
  cursor: move;
  z-index: 10;
  background-color: black; /*2196F3*/
  color: #fff;
}
#mydiv2header {
  padding: 7px;
  cursor: move;
  z-index: 10;
  background-color: #393caf;
  color: #fff;
}
#mydiv3header {
  padding: 7px;
  cursor: move;
  z-index: 10;
  background-color: orange;
  color: #fff;
}

#alertMsg {
  padding: 0px;
  background-color: grey;
  color: #fff;
  font-size: 11px;
}
</style>
<!-- Draggable DIV -->

<script>

// Make the DIV element draggable:
dragElement(document.getElementById("mydiv"));
dragElement(document.getElementById("mydiv2"));
dragElement(document.getElementById("mydiv3"));
function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    // if present, the header is where you move the DIV from:
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    // otherwise, move the DIV from anywhere inside the DIV:
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    // stop moving when mouse button is released:
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>