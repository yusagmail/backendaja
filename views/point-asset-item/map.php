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

<div class="panel splitter_container splitter-vertical" style="border:1px solid #d7d7d7; height:90vh;">
    <div id="areaOne">
        <div id="areaOneA">
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
        </div>
        <div id="areaOneB">
            <?php
            $searchModel = new \backend\models\PointSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            ?>

            <?= $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]) ?>
        </div>
    </div>

</div>


</script>

<?php
$this->registerJs(
    "  
    jQuery(function ($) {
        $('#areaOne').enhsplitter({minSize: 50, vertical: true, position: '70%'});

    });
    "
);
?>