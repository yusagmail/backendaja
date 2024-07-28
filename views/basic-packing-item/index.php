<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BasicPackingItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Basic Packing Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="basic-packing-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Basic Packing Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_basic_packing_item',
            'id_basic_packing',
            'id_material_support',
            'jumlah',
            'keterangan',
            //'created_id_user',
            //'created_date',
            //'created_ip_address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
