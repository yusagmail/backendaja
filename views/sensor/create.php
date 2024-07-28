<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sensor */

$this->title = 'Create Sensor';
$this->params['breadcrumbs'][] = ['label' => 'Sensors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-create-view box box-header">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
