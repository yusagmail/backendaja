<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JurnalType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jurnal-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_jurnal')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
