<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StrategicPointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asset Tracking';
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

<div class="panel splitter_container splitter-vertical" style="border:1px solid #d7d7d7; height:90vh;">
    <div id="areaOne">
        <div id="areaOneA">
            <?php 
                //echo $this->render('/globalmap/_main_map_reference_v1_point_display', [
                echo $this->render('/globalmap/_main_map_ref', [
                //echo $this->render('/globalmap/_main_map_reference', [
                     'jsonFilename' => $jsonFilename
                    //'searchModel' => $searchModel,
                    //'dataProvider' => $dataProvider,
            ]) ?>
        </div>
        <div id="areaOneB">
            Informasi
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