<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialFinish */
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



<div class="material-finish-form">

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
    if ($model->hasErrors()) {
    ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model); ?>
        </div>
    <?php
    }
    ?>
    <?php /*
    <?= $form->field($model, 'id_material')->textInput() ?>

    <?= $form->field($model, 'id_material_kategori1')->textInput() ?>

    <?= $form->field($model, 'id_material_kategori2')->textInput() ?>

    <?= $form->field($model, 'id_material_kategori3')->textInput() ?>
    */ ?>

    <?php
    $listGudang = \yii\helpers\ArrayHelper::map(\backend\models\Gudang::find()->orderBy([
        'nama_gudang' => SORT_ASC
    ])->asArray()->all(), 'id_gudang', 'nama_gudang');
    ?>

    <?= $form->field($model, 'id_gudang')->dropDownList(
        $listGudang,
        ['prompt' => 'Pilih Gudang ...']
    ); ?>

    <?php /*

    <?= $form->field($model, 'id_material_in_item_proc')->textInput() ?>

    <?= $form->field($model, 'id_material_in')->textInput() ?>

    <?= $form->field($model, 'id_gudang')->textInput() ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>
    */ ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>