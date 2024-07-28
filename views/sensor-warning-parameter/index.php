<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SensorWarningParameterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sensor Warning Parameters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-warning-parameter-index box box-header">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sensor Warning Parameter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_sensor_warning_parameter',
            'parameter_number',
            'label',
            'batas_bawah',
            'batas_atas',
            //'need_warning',
            //'color_label',
            //'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
