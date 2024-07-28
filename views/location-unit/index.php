<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LocationUnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$baseName = AppVocabularySearch::getValueByKey('Location Unit');
$this->title = $baseName;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-unit-index box box-success">

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE." ".$baseName, ['create'], ['class' => 'btn btn-success']) ?>

            <?php
            /*
            <?= Html::button('Import File',
                ['value' => Url::to(['/asset-item/import-file']),
                    'title' => 'Upload Data', 'class' => 'showModalButton btn btn-success']); ?>
             */
            ?>
        </p>
    </div>
    <div class="box-body">
    <?= \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'showPageSummary' => true,
        'pjax' => true,
        'striped' => true,
        'hover' => true,
        'responsiveWrap' => false,
        'panel' => ['type' => 'primary', 'heading' => 'Location Unit'],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        'columns' => [
            [
                'header' => 'No',
                'class' => 'yii\grid\SerialColumn'
            ],

//            'id_location_unit',
            'location.location_name',
            'owner.name',
            'label1',
            'label2',
            //'label3',
            //'keterangan1',
            //'keterangan2',
            //'keterangan3',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>
