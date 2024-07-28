<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AccountCodeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-code-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_account_code') ?>

    <?= $form->field($model, 'id_account_code_parent') ?>

    <?= $form->field($model, 'account_code') ?>

    <?= $form->field($model, 'account_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
