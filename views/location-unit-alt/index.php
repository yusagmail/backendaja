<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\LocationUnit;
use backend\models\Location;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LocationUnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CommonActionLabelEnum::LIST_ALL ." ". $mainLabel;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body type-asset1-index">

        
        <p>
            <p>
            <?= Html::a(CommonActionLabelEnum::CREATE ." ". $mainLabel, ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </p>

    <div class="box-body">
        <?php 
        $listColumnDynamic = AppFieldConfigSearch::getListGridView(LocationUnit::tableName());

        $dataList1 = ['' => '-- Pilih --'] + \yii\helpers\ArrayHelper::map(Location::find()->all(), 'id_location', 'location_name');
        $colLocationUnit = [
            'label' => \backend\models\AppFieldConfigSearch::getLabelName(LocationUnit::tableName(), 'id_location'),
            'attribute' => 'location.location_name',
            'filter'=>Html::activeDropDownList($searchModel, 'id_location', $dataList1, ['class' => 'form-control']),
        ];      
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_location', $colLocationUnit);
        
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'striped' => true,
            'hover' => true,
            'responsiveWrap' => false,
            'panel' => ['type' => 'primary', 'heading' => $this->title],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => $listColumnDynamic,
        ]); ?>

    </div>

    <?php /*
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'type_asset',
                'description:ntext',
                'is_active',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    */ ?>
    
    </div>
</div>
