<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StrukturMaterialItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="struktur-material-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_struktur_material_item') ?>

    <?= $form->field($model, 'id_material_raw_kategori') ?>

    <?= $form->field($model, 'created_id_user') ?>

    <?= $form->field($model, 'created_date') ?>

    <?= $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
