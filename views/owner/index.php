<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use backend\models\AppFieldConfigSearch;
use backend\models\Owner;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OwnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$baseName = AppVocabularySearch::getValueByKey('Owner');
$this->title = $baseName;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="owner-index box box-primary">
    <div class="box-header ">
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
    <?php
    $listColumnDynamic = AppFieldConfigSearch::getListGridView(Owner::tableName());

    //CustomColumn
    $coltypeAsset = [
        'label' => 'Type',
        'attribute' => 'id_owner',
        'filter'=>Html::activeDropDownList($searchModel, 'id_owner', ['class' => 'form-control']),
    ];
    $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_owner', $coltypeAsset);

    //echo var_export($listColumnDynamic, true); exit();

    echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'striped' => true,
        'hover' => true,
        'responsiveWrap' => false,
        'panel' => ['type' => 'primary', 'heading' => $baseName],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        'columns' => $listColumnDynamic,
    ]); ?>
</div>
</div>
