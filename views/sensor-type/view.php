<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorType */

//$this->title = $model->id_sensor_type;
$this->title = 'Detail '.'Sensor Type';
$this->params['breadcrumbs'][] = ['label' => 'Sensor Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body sensor-type-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_sensor_type], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_sensor_type], [
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
                'sensor_type',
            'description',
            ],
        ]) ?>

    </div>
</div>
