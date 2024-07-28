<?php

use backend\models\AssetMaster;
use backend\models\MstStatusReceived;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

//use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetReceivedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resume Kondisi Aset';
$this->params['breadcrumbs'][] = $this->title;

$dataAssetMaster = ['' => 'Choose'] + ArrayHelper::map(AssetMaster::find()->all(), 'id_asset_master', 'asset_name');
$dataStatusReceived = ['' => 'Choose'] + ArrayHelper::map(MstStatusReceived::find()->all(), 'id_status_received', 'status_received');
$dataProviderDisplay = $searchModel->search(Yii::$app->request->queryParams);
$querysql = (new \yii\db\Query())
    ->select(['a.id_asset_master,b.asset_name,a.received_year,a.received_date,a.price_received,a.quantity, Count(*) as num'])
    ->from('asset_received  a')
    ->innerJoin('asset_master b', 'b.id_asset_master = a.id_asset_master')
    ->groupBy(' received_year, id_asset_master');
?>
<div class="box box-success">
    <?php //echo $this->render('_laporan_search', ['model' => $searchModel]); ?>
    <?php
    $models = $dataProviderDisplay->getModels();
    ?>
    <div class="box-body">
        <?php Pjax::begin(['id' => 'pjax-grid-view']); ?>
        <?= \kartik\grid\GridView::widget([
            'dataProvider'=>new yii\data\ActiveDataProvider([
                'query'=>$querysql,
            ]),
//            'filterModel' => $searchModel,
            'showPageSummary' => true,
            'pjax' => true,
            'striped' => true,
            'hover' => true,
            'responsiveWrap' => false,
            'panel' => ['type' => 'primary', 'heading' => $this->title],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                [
                    'attribute' => 'asset_name',
                ],
                [
                    'attribute' => 'received_year',
                ],
                [
                    'attribute' => 'num',
                    'label' => 'Total'
                ],


            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>

</div>
