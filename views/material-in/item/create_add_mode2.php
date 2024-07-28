<?php

use yii\helpers\Html;

//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialInItemProc */

$this->title = 'Tambah Material In Item Proc';
$this->params['breadcrumbs'][] = ['label' => 'Material In Item Proc', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

<div class="box">
    <div class="box-body material-in-item-proc-create">


        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            //'action' => ['index1'],
            //'method' => 'get',
            'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label' => 'col-lg-4',
                    'offset' => 'col-lg-offset-4',
                    'wrapper' => 'col-lg-8',
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

        <div class="row">
            <?php //= $form->field($model, 'id_material_in')->textInput() 
            ?>
            <div class="col-md-6">
                <h3 class="box-title">Yard Awal</h3>
                <?= $form->field($model, 'yard_awal')->textInput() ?>
                <div class="form-group">
                    <label class="control-label col-lg-4" for="materialinitemproc-yard_awal"> &nbsp; </label>
                    <div class="col-lg-8">

                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <h3 class="box-title">Packing</h3>
                <?php //= $form->field($model, 'is_packing')->textInput() 
                ?>

                <?= $form->field($model, 'is_packing')->dropDownList(
                    ['0' => 'BELUM PACKING', '1' => 'SUDAH PACKING']
                ); ?>

                <?php //= $form->field($model, 'id_basic_packing')->textInput() 
                ?>
                <?php
                $listBackingPacking = \yii\helpers\ArrayHelper::map(\backend\models\BasicPacking::find()->orderBy([
                    'nama' => SORT_ASC
                ])->asArray()->all(), 'id_basic_packing', 'nama');
                ?>

                <?= $form->field($model, 'id_basic_packing')->dropDownList(
                    $listBackingPacking,
                    ['prompt' => 'Pilih Basic Packing ...']
                ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3 class="box-title">Yard Hitungan Ulang</h3>
                <?= $form->field($model, 'yard_hasil1')->textInput() ?>

                <?= $form->field($model, 'yard_hasil2')->textInput() ?>

                <?= $form->field($model, 'yard_hasil3')->textInput() ?>

                <?php /*
		    <?= $form->field($model, 'yard_hasil4')->textInput() ?>

		    <?= $form->field($model, 'yard_hasil5')->textInput() ?>

		    <?= $form->field($model, 'yard_hasil6')->textInput() ?>

		    */ ?>

                <?php //= $form->field($model, 'yard_hasil_total')->textInput() 
                ?>

                <?= $form->field($model, 'buang1')->textInput() ?>

                <?= $form->field($model, 'buang2')->textInput() ?>
            </div>
            <div class="col-md-6">
                <h3 class="box-title">Label Barcode Number</h3>
                <?php
                    $label1 = Html::a(
                    'CETAK',
                    ['material-in/generate-barcode', 'id_item' => $model->id_material_in_item_proc, 'id_parent' => $model->id_material_in, 'label' => 1,],
                    ['class' => 'btn btn-warning btn-sm']
                ) ?>

                <?= $form->field($model, 'label_barcode_number1')->textInput(['readonly' => true])->label($label1) ?>

                <?= $form->field($model, 'label_barcode_number2')->textInput(['readonly' => true])->label($label1) ?>

                <?= $form->field($model, 'label_barcode_number3')->textInput(['readonly' => true])->label($label1) ?>

                <?= Html::a(
                    'GENERATE',
                    ['material-in/generate-barcode', 'id_item' => $model->id_material_in_item_proc, 'id_parent' => $model->id_material_in, 'label' => 1,],
                    ['class' => 'btn btn-warning']
                ) ?>
            </div>
        </div>

        <?php /*
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
</div>