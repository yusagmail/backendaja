<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sensor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sensor') ?>

    <?= $form->field($model, 'sensor_name') ?>

    <?= $form->field($model, 'id_marketplace') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'imei') ?>

    <?php // echo $form->field($model, 'cid') ?>

    <?php // echo $form->field($model, 'barcode1') ?>

    <?php // echo $form->field($model, 'sensor_analog1') ?>

    <?php // echo $form->field($model, 'sensor_analog2') ?>

    <?php // echo $form->field($model, 'sensor_analog3') ?>

    <?php // echo $form->field($model, 'sensor_analog4') ?>

    <?php // echo $form->field($model, 'sensor_analog5') ?>

    <?php // echo $form->field($model, 'sensor_analog6') ?>

    <?php // echo $form->field($model, 'sensor_digital1') ?>

    <?php // echo $form->field($model, 'sensor_digital2') ?>

    <?php // echo $form->field($model, 'sensor_digital3') ?>

    <?php // echo $form->field($model, 'sensor_digital4') ?>

    <?php // echo $form->field($model, 'sensor_digital5') ?>

    <?php // echo $form->field($model, 'sensor_digital6') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <?php // echo $form->field($model, 'last_user_update') ?>

    <?php // echo $form->field($model, 'last_update_ip_address') ?>

    <?php // echo $form->field($model, 'token') ?>

    <?php // echo $form->field($model, 'flag_new_changes') ?>

    <?php // echo $form->field($model, 'flag_ack_devices') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
