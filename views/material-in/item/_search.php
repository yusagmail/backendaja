<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialInItemProcSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-in-item-proc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_material_in_item_proc') ?>

    <?= $form->field($model, 'id_material_in') ?>

    <?= $form->field($model, 'yard_awal') ?>

    <?= $form->field($model, 'yard_hasil1') ?>

    <?= $form->field($model, 'yard_hasil2') ?>

    <?php // echo $form->field($model, 'yard_hasil3') ?>

    <?php // echo $form->field($model, 'yard_hasil4') ?>

    <?php // echo $form->field($model, 'yard_hasil5') ?>

    <?php // echo $form->field($model, 'yard_hasil6') ?>

    <?php // echo $form->field($model, 'yard_hasil_total') ?>

    <?php // echo $form->field($model, 'buang1') ?>

    <?php // echo $form->field($model, 'buang2') ?>

    <?php // echo $form->field($model, 'is_packing') ?>

    <?php // echo $form->field($model, 'id_basic_packing') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
