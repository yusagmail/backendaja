<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\MrpProject */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
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
<div class="mrp-project-form">

 <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        //'action' => ['index1'],
        //'method' => 'get',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-2',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-10',
            ],
        ],
    ]); ?>

    

    <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'id_customer')->textInput() ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listModel = \yii\helpers\ArrayHelper::map(\backend\models\Customer::find()->orderBy([
        'nama_customer' => SORT_ASC
    ])->asArray()->all(), 'id_customer', 'nama_customer');
    ?>

    <?= $form->field($model, 'id_customer')->dropDownList(
        $listModel,
        ['prompt' => 'Pilih Customer ...']
    ); ?>

    <?php //= $form->field($model, 'is_internal_order')->textInput() ?>

    <?= $form->field($model, 'is_internal_order')->dropDownList(
        ['0' => 'TIDAK', '1' => 'YA']
    ); ?>

    <?php //= $form->field($model, 'is_main_order')->textInput() ?>

        <?= $form->field($model, 'is_main_order')->dropDownList(
        ['0' => 'TIDAK', '1' => 'YA']
    ); ?>

    <?php //= $form->field($model, 'plan_start_date')->textInput() ?>

    <?php
    echo $form->field($model, 'plan_start_date')->widget(datepicker::className(), [
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

    <?php //= $form->field($model, 'plan_end_date')->textInput() ?>

    <?php
    echo $form->field($model, 'plan_end_date')->widget(datepicker::className(), [
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

    <?= $form->field($model, 'remark')->textarea(['rows' => 3]) ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
