<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BankPembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visualisasi Sebaran Aset';
$this->params['breadcrumbs'][] = $this->title;

?>

<style>
  body { margin: 0; background-color: #ffffff; }
  #denahContainer { width: 90vw; height: 100vh; }
  canvas { display: block; }
  .controls {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 10;
  }
  .controls button {
    display: block;
    margin-bottom: 10px;
  }
</style>
<div class="box">
    <div class="box-body asset-location-index">
        <div class="box-body">
            <div id="tooltips" class="tooltips"
                style="position: absolute; background-color: white; border: 1px solid black; padding: 5px; display: none; pointer-events: none;">
            </div>
            <?= $this->render('_display_list_unit3', [
                //'model' => $model,
            ]) ?>
            <br>
            <div id="denahContainer" style="border: solid 1px black; width: 100%; height: 600px"></div>
        </div>
    </div>
</div>
<?php
  //_display_denah8 : Versi stabil baca dari json, tetapi blm bisa diklik.
  //_display_denah9 : sudah bisa diklik tetapi tidak jelas diklik dimana
 // _display_denah10 : menampilkan garis di wall
?>
  <?php 
/*
  echo $this->render('_display_denah_from_db2', [
      //'model' => $model,
  ]);
*/
  ?>

<?php
  //_display_denah2d_fromdb3 : sudah muncul tetapi masih ada bug
?>
<?= $this->render('_display_denah2d_from_db4', [
      //'model' => $model,
  ]) ?>
<?php
/*
  echo $this->render('_clickable_cubes5', [
      //'model' => $model,
  ]);
*/ 
?>
