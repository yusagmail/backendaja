<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorLog */

$this->title = 'Create Sensor Log';
$this->params['breadcrumbs'][] = ['label' => 'Sensor Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-log-create box box-header">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
