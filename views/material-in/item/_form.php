<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialInItemProc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-in-item-proc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_material_in')->textInput() ?>

    <?= $form->field($model, 'yard_awal')->textInput() ?>

    <?= $form->field($model, 'yard_hasil1')->textInput() ?>

    <?= $form->field($model, 'yard_hasil2')->textInput() ?>

    <?= $form->field($model, 'yard_hasil3')->textInput() ?>

    <?= $form->field($model, 'yard_hasil4')->textInput() ?>

    <?= $form->field($model, 'yard_hasil5')->textInput() ?>

    <?= $form->field($model, 'yard_hasil6')->textInput() ?>

    <?= $form->field($model, 'yard_hasil_total')->textInput() ?>

    <?= $form->field($model, 'buang1')->textInput() ?>

    <?= $form->field($model, 'buang2')->textInput() ?>

    <?= $form->field($model, 'is_packing')->textInput() ?>

    <?= $form->field($model, 'id_basic_packing')->textInput() ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
