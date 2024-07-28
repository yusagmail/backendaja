<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetMasterMapYearSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asset Master Map Years';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-master-map-year-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Asset Master Map Year', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_asset_master_map_year',
            'id_asset_master',
            'year',
            'current_count',
            'total_need',
            //'updated_date',
            //'updated_user',
            //'updated_ip_address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
