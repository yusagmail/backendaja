<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialInSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rekapitulasi Penjualan Tahunan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body material-in-index">

    <div class="row">
        <div class="box-body">
        <?= $this->render('_grafik_laporan_tahunan', [
             'dataProvider' => $dataProvider,
        ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="box-body">
        <?= $this->render('_grafik_laporan_pendapatan_tahunan', [
             'dataProvider' => $dataProvider,
        ]) ?>
        </div>
    </div>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <?= $this->render('_gridview_laporan_tahunan', [
             'dataProvider' => $dataProvider,
        ]) ?>
    </div>

</div>