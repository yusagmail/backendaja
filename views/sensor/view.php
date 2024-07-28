<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sensor */

$this->title = $model->sensor_name;
$this->params['breadcrumbs'][] = ['label' => 'Sensors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sensor-view box box-header">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_sensor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_sensor], [
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
//            'id_sensor',
            'sensor_name',
            'assetItem.number1',
            'marketPlace.marketplace_name',
            'description:ntext',
            'imei',
            'cid',
            'barcode1',
//            'sensor_analog1',
//            'sensor_analog2',
//            'sensor_analog3',
//            'sensor_analog4',
//            'sensor_analog5',
//            'sensor_analog6',
//            'sensor_digital1',
//            'sensor_digital2',
//            'sensor_digital3',
//            'sensor_digital4',
//            'sensor_digital5',
//            'sensor_digital6',
//            'last_update',
//            'last_user_update',
//            'last_update_ip_address',
//            'token',
//            'flag_new_changes',
//            'flag_ack_devices',
        ],
    ]) ?>

</div>
