<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;

/* @var $this yii\web\View */
/* @var $model backend\models\MstStatusReceived */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
?>
<style>
    div.required label.control-label:after {
        content: ' *';
        color: red;
    }
</style>

<?php
//CSS Ini digunakan untuk overide jarak antar form biar tidak terlalu jauh
?>
<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>

<div class="mst-status-received-form box box-success">

    <div class="box-header with-border">
        <p>
            <?= Html::a('<< '.CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
    </div>

    <div class="box-header with-border">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            //'action' => ['index1'],
            //'method' => 'get',
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    'offset' => 'col-sm-offset-2',
                    'wrapper' => 'col-sm-9',
                ],
            ],
        ]); ?>

        <?= $form->field($model, 'status_received')->textInput(['maxlength' => true]) ?>

        <?php $dataActive = ['1' => 'Active', '0' => 'No Active'];
        echo $form->field($model, 'is_active')->dropDownList($dataActive,
            ['prompt' => '-Choose-']); ?>

        <div class="box-footer">
            <div class="form-group">
                <?= Html::submitButton(CommonActionLabelEnum::SAVE, ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
