<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LogActivity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'log_date')->textInput() ?>

    <?= $form->field($model, 'log_datetime')->textInput() ?>

    <?= $form->field($model, 'tablename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'related_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_activity')->textInput() ?>

    <?= $form->field($model, 'userid')->textInput() ?>

    <?= $form->field($model, 'ip_address_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'additional_info1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'additional_info2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'additional_info3')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
