<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemReservationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-item-reservation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_item_reservation') ?>

    <?= $form->field($model, 'id_asset_item') ?>

    <?= $form->field($model, 'event_date') ?>

    <?= $form->field($model, 'start_time') ?>

    <?= $form->field($model, 'end_time') ?>

    <?php // echo $form->field($model, 'event_name') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'pic') ?>

    <?php // echo $form->field($model, 'reservation_time') ?>

    <?php // echo $form->field($model, 'reservation_name') ?>

    <?php // echo $form->field($model, 'reservation_id_user') ?>

    <?php // echo $form->field($model, 'reservation_ip_address') ?>

    <?php // echo $form->field($model, 'reservation_phone') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
