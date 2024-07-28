<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Point';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body point-index">

        
        <p>
            <?= Html::a('Add Point', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
            'icon',
            'color',
            'latitude',
            'longitude',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
