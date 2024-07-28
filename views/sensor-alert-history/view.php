<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorAlertHistory */

$this->title = $model->id_sensor_alert_history;
$this->params['breadcrumbs'][] = ['label' => 'Sensor Alert Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sensor-alert-history-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_sensor_alert_history], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_sensor_alert_history], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_sensor_alert_history',
            'id_sensor',
            'channel',
            'channel_number',
            'first_appereance_time',
            'first_appereance_value',
            'last_appreance_time',
            'last_appreance_value',
            'is_case_open',
            'alert_message',
        ],
    ]) ?>

</div>
