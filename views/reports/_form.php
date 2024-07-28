<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Reports */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: " *";
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
<div class="reports-form">
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-2',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-10',
            ],
        ],
    ]); ?>

    <?php
    $dataListFenomena = \yii\helpers\ArrayHelper::map(\backend\models\Phenomenons::find()->orderBy([
        'name' => SORT_ASC
        ])->
        asArray()->all(), 'id', 'name');
    ?>

    <?= $form->field($model, 'phenomenon_id')->dropDownList(
        $dataListFenomena,
        ['prompt' => 'Pilih Kategori ...']
    ); ?>

    <?php //= $form->field($model, 'phenomenon_id')->textInput(['maxlength' => true]) ?>
    <?php
    $dataListVillage = \yii\helpers\ArrayHelper::map(\backend\models\Villages::find()->orderBy([
        'name' => SORT_ASC
        ])->
        asArray()->all(), 'id', 'name');
    ?>

    <?= $form->field($model, 'village_id')->dropDownList(
        $dataListVillage,
        ['prompt' => 'Pilih Desa ...']
    ); ?>

    <?php //= $form->field($model, 'village_id')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'date')->textInput() ?>

    <?php
    echo $form->field($model, 'date')->widget(datepicker::className(), [
        'model' => $model,
        'attribute' => 'date',
        'template' => '{addon}{input}',
        //'options' => ['readonly' => 'readonly'],
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            //'endDate' => date('Y-m-d'),
        ]
    ]);
    ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'referensi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'long')->textInput(['maxlength' => true]) ?>

    

    <?php //= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>
    <?php
    $dataUser = \yii\helpers\ArrayHelper::map(\backend\models\Users::find()->orderBy([
        'name' => SORT_ASC
        ])->
        asArray()->all(), 'id', 'name');
    ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        $dataUser,
        ['prompt' => 'Pilih User ...']
    ); ?>


    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    
    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
