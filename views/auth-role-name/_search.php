<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthRoleNameSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-role-name-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_auth_role_name') ?>

    <?= $form->field($model, 'auth_item_name') ?>

    <?= $form->field($model, 'role_name') ?>

    <?= $form->field($model, 'as_generic_choice') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
