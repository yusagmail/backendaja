<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetReceivedToItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-received-to-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_received_to_item') ?>

    <?= $form->field($model, 'id_asset_received') ?>

    <?= $form->field($model, 'id_asset_item') ?>

    <?= $form->field($model, 'created_user') ?>

    <?= $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
