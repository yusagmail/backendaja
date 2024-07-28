<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\MaterialInItemProc */
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
        margin-top: 0px;
    }

</style>

<div class="material-in-item-proc-form">



    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        //'action' => ['index1'],
        //'method' => 'get',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-3',
                'offset' => 'col-lg-offset-4',
                'wrapper' => 'col-lg-9',
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

    <?php
    $listBackingPacking1[0] = 'Belum Packing' ;
    $listBackingPacking2 = \yii\helpers\ArrayHelper::map(\backend\models\BasicPacking::find()->orderBy([
        'nama' => SORT_ASC
    ])->asArray()->all(), 'id_basic_packing', 'nama');
    $listBackingPacking = array_merge($listBackingPacking1, $listBackingPacking2);
    ?>

    <?php //= $form->field($model, 'id_material_in')->textInput() 
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

    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="box-title">Yard Hitungan Ulang</h3>

            <?php /*
            <div class="form-group">
                
                <div class="col-lg-4">
                     <?= $form->field($model, 'yard_hasil1')->textInput() ?>
                </div>
                <div class="col-lg-4"> 
                    <?= $form->field($model, 'id_basic_packing1')->dropDownList(
                        $listBackingPacking,
                        //['prompt' => 'Pilih Basic Packing ...']
                    ); ?>
                </div>
                <div class="col-lg-4"> 
                    <?= $form->field($model, 'id_basic_packing1')->dropDownList(
                        $listBackingPacking,
                        ['prompt' => 'Pilih Basic Packing ...']
                    ); ?>
                </div>
            </div>
            */ ?>

            <?php
            for ($i=1;$i<=6;$i++){
                $field_yard_hasil = 'yard_hasil'.$i;
                $field_basic_packing = 'id_basic_packing'.$i;
            ?>
            <div class="form-group">
                
                <div class="col-lg-4">
                     <?= $form->field($model, $field_yard_hasil)->textInput() ?>
                </div>
                <div class="col-lg-4"> 
                    <?= $form->field($model, $field_basic_packing)->dropDownList(
                        $listBackingPacking,
                        //['prompt' => 'Pilih Basic Packing ...']
                    ); ?>
                </div>
                <div class="col-lg-4"> 
                    <?= $form->field($model, 'id_basic_packing1')->dropDownList(
                        $listBackingPacking,
                        ['prompt' => 'Pilih Basic Packing ...']
                    ); ?>
                </div>
            </div>
            <?php
            }
            ?>

            <?php
            for ($i=1;$i<=2;$i++){
                $field_yard_hasil = 'buang'.$i;
                $field_basic_packing = 'id_basic_packing'.$i;
            ?>
            <div class="form-group">
                
                <div class="col-lg-4">
                     <?= $form->field($model, $field_yard_hasil)->textInput() ?>
                </div>
                <div class="col-lg-4"> 
                    
                </div>
                <div class="col-lg-4"> 
                    
                </div>
            </div>
            <?php
            }
            ?>
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