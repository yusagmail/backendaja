<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BaseSalary */
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

<div class="base-salary-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'class' => 'form-horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-3',
                'wrapper' => 'col-sm-10',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>


    <?php //= $form->field($model, 'id_pegawai')->textInput() ?>

    <?php
    $listPegawai = \yii\helpers\ArrayHelper::map(\backend\models\HrmPegawai::find()->orderBy([
        'nama_lengkap' => SORT_ASC
    ])->asArray()->all(), 'id_pegawai', 'nama_lengkap');
    ?>

    <?= $form->field($model, 'id_pegawai')->dropDownList(
        $listPegawai,
    ); ?>

    <?= $form->field($model, 'gaji_pokok')->textInput() ?>

    <?= $form->field($model, 'tunjangan1')->textInput() ?>

    <?= $form->field($model, 'tunjangan2')->textInput() ?>

     <?php /*

    <?= $form->field($model, 'tunjangan3')->textInput() ?>

    <?= $form->field($model, 'tunjangan4')->textInput() ?>

    <?= $form->field($model, 'tunjangan5')->textInput() ?>
    */ ?>

    <?= $form->field($model, 'rate_lembur')->textInput() ?>

    <?= $form->field($model, 'rate_kehadiran')->textInput() ?>

    <?php /*
    <?= $form->field($model, 'property1')->textInput() ?>

    <?= $form->field($model, 'property2')->textInput() ?>

    <?= $form->field($model, 'property3')->textInput() ?>

    <?= $form->field($model, 'property4')->textInput() ?>

    <?= $form->field($model, 'property5')->textInput() ?>
    */ ?>

    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
