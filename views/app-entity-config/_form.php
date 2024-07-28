<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AppEntityConfig */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-entity-config-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'entity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'setting_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
