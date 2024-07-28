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
    $jsonFilename = "point.geojson";

    //0. Check apakah file tersebut sudah ada atau belum

    $jsonFilename = "point.geojson";
    //$path = "mapbase/geojson/".$jsonFilename;
    $path = "localgeojson/".$jsonFilename;
    if(file_exists($path)){
        //echo 'File ada';
    }else{
        echo 'File Geojson Not Found!';
    }


    //1. Cek terlebih dahulu apakah ada pembahruan data
    //Kalau ada generate data terlebih dahulu
    $myfile = fopen($path, "w") or die("Unable to open file!");
    $txt = \backend\models\PointSearch::convertToGeoJson();
    fwrite($myfile, $txt);

    //2. Load data JSON

?>



<div class="">
        
            <?php 
                //echo $this->render('/globalmap/_main_map_reference_v1_point_display', [

                //Bisa display map dengan labelnya : _main_map_reference_v2_point_and_label
                //echo $this->render('/globalmap/_main_map_reference', [

                //Bisa display map dengan labelnya dan generate dari tabel : _main_map_ref. Hasilnya masih disimpan di mapbase (masih tercampur)
                //echo $this->render('/globalmap/_main_map_ref', [
            

            echo $this->render('/globalmap/_main_map_ref_point_add', [
                'jsonFilename' => $jsonFilename
                //'searchModel' => $searchModel,
                //'dataProvider' => $dataProvider,
            ]) ?>
       
        
            <?php  echo $this->render('/global/_fancybox_dialog', [
            ]) ?>
            <?php
            $searchModel = new \backend\models\PointSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            ?>
            <div id="mydiv" class="box">
              <!-- Include a header DIV with the same name as the draggable DIV, followed by "header" -->

                <div class="box-header with-border" id="mydivheader">
                    <h3 class="box-title">List Point</h3>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
              <div class="box-body">
                <?= $this->render('index-panel', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]) ?>
                </div>
            </div>

            <div id="mydiv2">
              <!-- Include a header DIV with the same name as the draggable DIV, followed by "header" -->
              <div id="mydiv2header">Add Point</div>
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
  z-index: 9;
  background-color: #f1f1f1;
  border: 1px solid #d3d3d3;
  text-align: left;
  width: 400px;
}
#mydivheader {
  padding: 10px;
  cursor: move;
  z-index: 10;
  background-color: #2196F3;
  color: #fff;
}
#mydiv2header {
  padding: 10px;
  cursor: move;
  z-index: 10;
  background-color: #2196F3;
  color: #fff;
}
</style>
<!-- Draggable DIV -->

<script>

// Make the DIV element draggable:
dragElement(document.getElementById("mydiv"));
dragElement(document.getElementById("mydiv2"));
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