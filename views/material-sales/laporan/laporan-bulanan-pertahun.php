<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialInSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rekapitulasi Penjualan Bulanan di Tahun '.$year;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body material-in-index">
        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <?= $this->render('_gridview_laporan_bulanan', [
             'dataProvider' => $dataProvider,
        ]) ?>
    </div>

</div>