<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use backend\models\AppFieldConfigSearch;
use backend\models\LocationUnit;
use backend\models\Location;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\LocationUnit */
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

<div class="type-asset1-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        //'action' => ['index1'],
        //'method' => 'get',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-8',
            ],
        ],
    ]); ?>
    
    <?php     if ($model->hasErrors()) {
    ?>        <div class="alert alert-danger">
            <?php  echo $form->errorSummary($model); ?>        </div>
    <?php     }
    ?>

    <?php /*

    <?= $form->field($model, 'type_asset')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_active')->textInput() ?>
    */ ?>
        <?php
            $dataLocationUnit = ArrayHelper::map(Location::find()->asArray()->all(), 'id_location', 'location_name');
            
            //$dataTypeAsset1 = ArrayHelper::map(LocationUnit::find()->asArray()->all(), 'id_type_asset', 'type_asset');
            
            $listElements = AppFieldConfigSearch::getListFormElement(LocationUnit::tableName(), $form, $model);
            
            //Custom Elements
            
            $elementListLocation = $form->field($model, 'id_location')->dropDownList($dataLocationUnit,
                ['prompt' => '--Pilih--'])->label( \backend\models\AppFieldConfigSearch::getLabelName(LocationUnit::tableName(), 'id_location')) ;
            $listElements = AppFieldConfigSearch::replaceFormElement($listElements, "id_location", $elementListLocation);

            
            //Custom Elements
            
            //$elementLocationUnit = $form->field($model, 'id_type_asset1')->dropDownList($dataLocationUnit,
            //    ['prompt' => '--Pilih--']);
            //$listElements = AppFieldConfigSearch::replaceFormElement($listElements, "id_type_asset1", $elementLocationUnit);
            
            foreach($listElements as $formdis){
                echo $formdis;
            }
            
        ?>

        <div class="box-footer">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
