<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorLabel */

//$this->title = $model->id_sensor_label;
$this->title = 'Detail '.'Sensor Label';
$this->params['breadcrumbs'][] = ['label' => 'Sensor Label', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body sensor-label-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_sensor_label], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_sensor_label], [
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
                'type_channel',
            'channel_number',
            'channel_name',
            'batas_bawah',
            'is_warning_batas_bawah',
            'color_batas_bawah',
            'batas_atas',
            'is_warning_batas_atas',
            'color_batas_atas',
            'color_normal',
            ],
        ]) ?>

    </div>
</div>
