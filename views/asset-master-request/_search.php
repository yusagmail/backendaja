<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterRequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-master-request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_master_request') ?>

    <?= $form->field($model, 'id_asset_master') ?>

    <?= $form->field($model, 'request_date') ?>

    <?= $form->field($model, 'request_datetime') ?>

    <?= $form->field($model, 'request_notes') ?>

    <?php // echo $form->field($model, 'requested_by') ?>

    <?php // echo $form->field($model, 'requested_user_id') ?>

    <?php // echo $form->field($model, 'requested_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
