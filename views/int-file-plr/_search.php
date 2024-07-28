<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IntFilePlrSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="int-file-plr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_int_file_plr') ?>

    <?= $form->field($model, 'nama_file') ?>

    <?= $form->field($model, 'created_date') ?>

    <?= $form->field($model, 'created_user_id') ?>

    <?= $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
