<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReferencePointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reference Point';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body reference-point-index">

        
        <p>
            <?= Html::a('Add Reference Point', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
            'display_name',
            'latitude',
            'longitude',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
