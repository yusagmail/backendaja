<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialRawKategori1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Geirge';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body material-index">

        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Tambah Master Geirge', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-file-alt"></span> '.$this->title],
            'export' => [
                'label' => 'Export',
            ],
            'pager' => [
                'firstPageLabel' => 'First',
                'lastPageLabel'  => 'Last'
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'kode',
                'nama',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>