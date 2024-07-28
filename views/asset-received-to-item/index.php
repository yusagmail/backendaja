<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetReceivedToItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asset Received To Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-received-to-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Asset Received To Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_asset_received_to_item',
            'id_asset_received',
            'id_asset_item',
            'created_user',
            'created_date',
            //'created_ip_address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
