<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialFinishDelete */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-finish-delete-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_material_finish')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_material')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_material_kategori1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_material_kategori2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_material_kategori3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'yard')->textInput() ?>

    <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'no_urut')->textInput() ?>

    <?= $form->field($model, 'no_urut_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_splitting')->textInput() ?>

    <?= $form->field($model, 'barcode_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_packing')->textInput() ?>

    <?= $form->field($model, 'id_basic_packing')->textInput() ?>

    <?= $form->field($model, 'id_material_in_item_proc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_material_in')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_join_packing')->textInput() ?>

    <?= $form->field($model, 'join_info')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_gudang')->textInput() ?>

    <?= $form->field($model, 'alasan_hapus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
