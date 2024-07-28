<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetDismantleReceivedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-dismantle-received-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_dismantle_received') ?>

    <?= $form->field($model, 'id_asset_dismantle_order') ?>

    <?= $form->field($model, 'id_warehouse') ?>

    <?= $form->field($model, 'received_date') ?>

    <?= $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'is_approved') ?>

    <?php // echo $form->field($model, 'approval_user_id') ?>

    <?php // echo $form->field($model, 'approval_date') ?>

    <?php // echo $form->field($model, 'approval_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
