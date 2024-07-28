<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorLog */
/* @var $form yii\widgets\ActiveForm */
$listdata=\yii\helpers\ArrayHelper::map(\backend\models\Sensor::find()->asArray()->all(), 'id_sensor', 'sensor_name');
?>

<div class="sensor-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sensor')->label('Sensor Name')->dropDownList(
        $listdata,
        ['prompt'=>'--- Select Sensor Name ---']
    ); ?>

    <?= $form->field($model, 'log_time')->textInput() ?>

    <?= $form->field($model, 'log_date')->textInput() ?>

    <?= $form->field($model, 'value1')->textInput() ?>

<!--    --><?php //$form->field($model, 'value2')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'value3')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'value4')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'value5')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
