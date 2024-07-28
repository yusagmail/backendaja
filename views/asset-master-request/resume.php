<?php


/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetMasterRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Resume Kebutuhan Asset';
$this->params['breadcrumbs'][] = $this->title;
$querysql = (new \yii\db\Query())
    ->select(['a.id_asset_master,b.asset_name,a.received_year,a.received_date,a.price_received,a.quantity, Count(*) as num'])
    ->from('asset_received  a')
    ->innerJoin('asset_master b', 'b.id_asset_master = a.id_asset_master')
    ->groupBy(' received_year, id_asset_master');

use yii\data\ActiveDataProvider;
use yii\widgets\Pjax; ?>

<div class="box box-success">
    <br/>
    <?php echo $this->render('laporan_search', ['model' => $searchModel]); ?>

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
            'panel' => ['type' => 'primary', 'heading' => 'Laporan Pengajuan Asset'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
				[
                    'attribute' => 'asset_name',
                ],
                [
                    'attribute' => 'received_year',
                    'label' => 'Request Year'

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
