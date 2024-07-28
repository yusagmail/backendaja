<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorAlert */

$this->title = 'Create Sensor Alert';
$this->params['breadcrumbs'][] = ['label' => 'Sensor Alerts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-alert-create box box-header">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
