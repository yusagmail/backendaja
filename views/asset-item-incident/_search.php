<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemIncidentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-item-incident-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_item_incident') ?>

    <?= $form->field($model, 'id_asset_item') ?>

    <?= $form->field($model, 'incident_date') ?>

    <?= $form->field($model, 'incident_datetime') ?>

    <?= $form->field($model, 'incident_notes') ?>

    <?php // echo $form->field($model, 'reported_by') ?>

    <?php // echo $form->field($model, 'reported_user_id') ?>

    <?php // echo $form->field($model, 'reported_ip_address') ?>

    <?php // echo $form->field($model, 'photo1') ?>

    <?php // echo $form->field($model, 'photo2') ?>

    <?php // echo $form->field($model, 'photo3') ?>

    <?php // echo $form->field($model, 'photo4') ?>

    <?php // echo $form->field($model, 'photo5') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
