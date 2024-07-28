<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TypeAsset1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Type Asset1s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-asset1-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Type Asset1', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_type_asset',
            'type_asset',
            'description:ntext',
            'is_active',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TypeAsset1 $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_type_asset' => $model->id_type_asset]);
                 }
            ],
        ],
    ]); ?>


</div>
