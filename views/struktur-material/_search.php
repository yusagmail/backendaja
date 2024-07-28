<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StrukturMaterialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="struktur-material-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_struktur_material') ?>

    <?= $form->field($model, 'id_material') ?>

    <?= $form->field($model, 'id_material_kategori1') ?>

    <?= $form->field($model, 'id_material_kategori2') ?>

    <?= $form->field($model, 'id_material_kategori3') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
