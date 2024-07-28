<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Defecta */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: ' *';
        color: red;
    }

    .form-group {
        margin-bottom: 0px;
    }
</style>

<div class="defecta-form">

    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'layout' => 'horizontal',
        //'action' => ['index1'],
        //'method' => 'get',
        'options' => ['encrypt' => 'multipart/form-data'],
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-10',
            ],
        ],
    ]); ?>

    <?php //= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'request_date')->textInput() ?>

    <?= $form->field($model, 'request_date')->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd', // Format tanggal yang diinginkan
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'changeYear' => true,
            'changeMonth' => true,
            'yearRange' => '1900:' . date('Y'),
        ],
    ]) ?>

    <?php //= $form->field($model, 'month')->textInput() ?>

    <?php //= $form->field($model, 'year')->textInput() ?>

    <?php //= $form->field($model, 'id_gudang')->textInput() ?>

    <?php
    //Mengambil list dari tabel Gudang
    $listGudang = \yii\helpers\ArrayHelper::map(\backend\models\Gudang::find()->orderBy([
        'nama_gudang' => SORT_ASC
        ])->
        asArray()->all(), 'id_gudang', 'nama_gudang');
    ?>

    <?= $form->field($model, 'id_gudang')->dropDownList(
        $listGudang,
        ['prompt' => 'Pilih Gudang ...']
    ); ?>

    <?php //= $form->field($model, 'created_at')->textInput() ?>

    <?php //= $form->field($model, 'updated_at')->textInput() ?>

        <div class="box-footer">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
