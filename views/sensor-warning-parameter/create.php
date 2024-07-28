<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorWarningParameter */

$this->title = 'Create Sensor Warning Parameter';
$this->params['breadcrumbs'][] = ['label' => 'Sensor Warning Parameters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-warning-parameter-create box box-header">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
