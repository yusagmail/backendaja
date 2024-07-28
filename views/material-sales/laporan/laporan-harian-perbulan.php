<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialInSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rekapitulasi Penjualan Harian di Bulan '.common\helpers\Timeanddate::getMonthYearSortIndo($month, $year);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body material-in-index">
    </div>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <?= $this->render('_gridview_laporan_harian', [
             'dataProvider' => $dataProvider,
        ]) ?>
    </div>

</div>