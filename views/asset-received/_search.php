<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetReceivedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-received-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_received') ?>

    <?= $form->field($model, 'id_asset_master') ?>

    <?= $form->field($model, 'number1') ?>

    <?= $form->field($model, 'number2') ?>

    <?= $form->field($model, 'number3') ?>

    <?php // echo $form->field($model, 'received_date') ?>

    <?php // echo $form->field($model, 'received_year') ?>

    <?php // echo $form->field($model, 'price_received') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'id_status_received') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
