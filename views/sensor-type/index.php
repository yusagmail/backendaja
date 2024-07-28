<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SensorTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sensor Type';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body sensor-type-index">

        
        <p>
            <?= Html::a('Tambah Sensor Type', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'sensor_type',
            'description',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
