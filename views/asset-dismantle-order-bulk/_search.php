<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetDismantleOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-dismantle-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_dismantle_order') ?>

    <?= $form->field($model, 'id_supervisor') ?>

    <?= $form->field($model, 'type_order') ?>

    <?= $form->field($model, 'id_job_class') ?>

    <?= $form->field($model, 'order_date') ?>

    <?php // echo $form->field($model, 'order_number') ?>

    <?php // echo $form->field($model, 'order_increment') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'id_asset_item') ?>

    <?php // echo $form->field($model, 'id_customer') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
