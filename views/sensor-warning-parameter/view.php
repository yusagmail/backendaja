<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorWarningParameter */

$this->title = $model->id_sensor_warning_parameter;
$this->params['breadcrumbs'][] = ['label' => 'Sensor Warning Parameters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sensor-warning-parameter-view box box-header">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_sensor_warning_parameter], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_sensor_warning_parameter], [
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
//            'id_sensor_warning_parameter',
            'parameter_number',
            'label',
            'batas_bawah',
            'batas_atas',
            'need_warning',
            'color_label',
            'description',
        ],
    ]) ?>

</div>
