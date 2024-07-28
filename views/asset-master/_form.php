<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\TypeAsset1;
use backend\models\TypeAsset2;
use backend\models\TypeAsset3;
use backend\models\TypeAsset4;
use backend\models\TypeAsset5;
use backend\models\AssetCode;
use backend\models\AppFieldConfigSearch;
use backend\models\AssetMaster;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMaster */
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

<div class="asset-master-form box box-success">

    <div class="box-header with-border">
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
		
		<?php
			$listElements = AppFieldConfigSearch::getListFormElement(AssetMaster::tableName(), $form, $model);
			
			//Custom Elements
			$dataTypeAsset1 = ArrayHelper::map(TypeAsset1::find()->asArray()->all(), 'id_type_asset', 'type_asset');
			$elementTypeAsset1 = $form->field($model, 'id_type_asset1')->dropDownList($dataTypeAsset1,
				['prompt' => '-Pilih Type-']);
			$listElements = AppFieldConfigSearch::replaceFormElement($listElements, "id_type_asset1", $elementTypeAsset1);


			foreach($listElements as $formdis){
				echo $formdis;
			}
		?>

        <!-- <?php $dataTypeAsset2 = yii\helpers\ArrayHelper::map(backend\models\TypeAsset2::find()->asArray()->all(), 'id_type_asset_item', 'type_asset_item');
	            echo $form->field($model, 'status')->dropDownList($dataTypeAsset2,
		        ['prompt' => '-Pilih Status-']); 
	            ?> -->

        <?= $form->field($model, 'deskripsi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'date')->widget(datepicker::className(),[
                            'model' => $model,
                            'attribute' => 'date',
                            'template' => '{addon}{input}',
                            //'options'=>['readonly'=>'readonly'],
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                                'endDate' =>date('Y-m-d'),
                            ]
                        ]);?>

        <?php $dataListSupplier = yii\helpers\ArrayHelper::map(backend\models\Supplier::find()->asArray()->all(), 'id_supplier', 'nama_supplier');
	            echo $form->field($model, 'id_supplier')->dropDownList($dataListSupplier,
		        ['prompt' => '-Pilih-']); 
	            ?>
		<?php 
		/*
        <?= $form->field($model, 'asset_name')->textInput(['maxlength' => true]) ?>

        <?php $dataTypeAsset1 = ArrayHelper::map(AssetCode::find()->asArray()->all(), 'id_asset_code', 'code');
        echo $form->field($model, 'id_asset_code')->dropDownList($dataTypeAsset1,
            ['prompt' => '-Choose a Code-']); ?>

        <?= $form->field($model, 'asset_code')->textInput(['maxlength' => true]) ?>

        <?php $dataTypeAsset1 = ArrayHelper::map(TypeAsset1::find()->asArray()->all(), 'id_type_asset', 'type_asset');
        echo $form->field($model, 'id_type_asset1')->dropDownList($dataTypeAsset1,
            ['prompt' => '-Choose a Type Asset 1-']); ?>

        <?php $dataTypeAsset2 = ArrayHelper::map(TypeAsset2::find()->asArray()->all(), 'id_type_asset', 'type_asset');
        echo $form->field($model, 'id_type_asset2')->dropDownList($dataTypeAsset2,
            ['prompt' => '-Choose a Type Asset 2-']); ?>

        <?php $dataTypeAsset3 = ArrayHelper::map(TypeAsset3::find()->asArray()->all(), 'id_type_asset', 'type_asset');
        echo $form->field($model, 'id_type_asset3')->dropDownList($dataTypeAsset3,
            ['prompt' => '-Choose a Type Asset 3-']); ?>

        <?php $dataTypeAsset4 = ArrayHelper::map(TypeAsset4::find()->asArray()->all(), 'id_type_asset', 'type_asset');
        echo $form->field($model, 'id_type_asset4')->dropDownList($dataTypeAsset4,
            ['prompt' => '-Choose a Type Asset 4-']); ?>

        <?php $dataTypeAsset5 = ArrayHelper::map(TypeAsset5::find()->asArray()->all(), 'id_type_asset', 'type_asset');
        echo $form->field($model, 'id_type_asset5')->dropDownList($dataTypeAsset5,
            ['prompt' => '-Choose a Type Asset 5-']); ?>

        <?= $form->field($model, 'attribute1')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'attribute2')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'attribute3')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'attribute4')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'attribute5')->textInput(['maxlength' => true]) ?>
		*/
		?>

        <div class="box-footer">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
