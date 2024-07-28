<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SensorAlertHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sensor Alert Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-alert-history-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sensor Alert History', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sensor_alert_history',
            'id_sensor',
            'channel',
            'channel_number',
            'first_appereance_time',
            //'first_appereance_value',
            //'last_appreance_time',
            //'last_appreance_value',
            //'is_case_open',
            //'alert_message',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
