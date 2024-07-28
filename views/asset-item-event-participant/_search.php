<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemEventParticipantSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-item-event-participant-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_item_event_participant') ?>

    <?= $form->field($model, 'id_asset_item_event') ?>

    <?= $form->field($model, 'participant_type') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'participant_name') ?>

    <?php // echo $form->field($model, 'participant_affiliation') ?>

    <?php // echo $form->field($model, 'participant_phone') ?>

    <?php // echo $form->field($model, 'participant_email') ?>

    <?php // echo $form->field($model, 'participant_position') ?>

    <?php // echo $form->field($model, 'is_confirm_present') ?>

    <?php // echo $form->field($model, 'is_present') ?>

    <?php // echo $form->field($model, 'checkin_time') ?>

    <?php // echo $form->field($model, 'checkout_time') ?>

    <?php // echo $form->field($model, 'has_print_certificate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
