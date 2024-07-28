<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MstStatusDismantleOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mst-status-dismantle-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status_dismantle_order')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
