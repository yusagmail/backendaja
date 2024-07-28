<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use backend\models\AssetItem_Generic;
use backend\models\AppFieldConfigSearch;
use backend\models\TypeAssetItem3;
use common\labeling\CommonActionLabelEnum;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem_Generic */
/* @var $form yii\widgets\ActiveForm */

$varian_group = "";

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

<div class="type-asset1-form box box-success">
    <div class="box-header with-border">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'enableAjaxValidation' => true,
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
        $tableName = AssetItem_Generic::tableName(); //Ini yang diganti (Nama tabel dari modelnya)
        $listElements = AppFieldConfigSearch::getListFormElement($tableName, $form, $model, $varian_group);

		//Tambahkan Asset Master
		$dataAssetMaster = ArrayHelper::map(
			\backend\models\AssetMaster::find()->asArray()->all(),
			'id_asset_master',
			function($model) {
				return $model['asset_name'].' - '.$model['asset_code'];
			}
		);
		$listAssetMaster = $form->field($model, 'id_asset_master')->widget(Select2::classname(), [
			'data' => $dataAssetMaster,
			'options' => ['placeholder' => 'Pilih Asset'],
			'pluginOptions' => [
				'allowClear' => true
			],
		])->label('Nama Asset');
	    $listElements = AppFieldConfigSearch::replaceFormElement($listElements, "id_asset_master", $listAssetMaster);


		/*
        //Custom Elements (Untuk elemen tertentu yang ingin diganti)
        $elemenStatus = $form->field($model, 'is_active',
            ['wrapperOptions' => ['style' => 'display:inline-block']])
            ->inline(true)
            ->radioList(['1' => CommonActionLabelEnum::ACTIVE, '0' => CommonActionLabelEnum::IN_ACTIVE]);
        $listElements = AppFieldConfigSearch::replaceFormElement($listElements, "is_active", $elemenStatus);
		*/

		/*
		$dataListGambar = ArrayHelper::map(TypeAssetItem3::find()->asArray()->all(), 'id_type_asset_item', 'type_asset_item');
		$labelName = AppFieldConfigSearch::getLabelName($tableName, 'id_type_asset_item3', $varian_group);
		$elemenTypeAssetItem3 = $form->field($model, 'id_type_asset_item3')->dropDownList($dataListAssetTypeAsetItem3,
            ['prompt' => '-Pilih-'])->label($labelName);
		$listElements = AppFieldConfigSearch::replaceFormElement($listElements, "id_type_asset_item3", $elemenTypeAssetItem3);
		*/
		
		//Replace
		$dataListAssetTypeAsetItem3 = ArrayHelper::map(TypeAssetItem3::find()->asArray()->all(), 'id_type_asset_item', 'type_asset_item');
		$labelName = AppFieldConfigSearch::getLabelName($tableName, 'id_type_asset_item3', $varian_group);
		$elemenTypeAssetItem3 = $form->field($model, 'id_type_asset_item3')->dropDownList($dataListAssetTypeAsetItem3,
            ['prompt' => '-Pilih-'])->label($labelName);
		$listElements = AppFieldConfigSearch::replaceFormElement($listElements, "id_type_asset_item3", $elemenTypeAssetItem3);

        //Tampilkan secara Dinamis
        foreach($listElements as $formdis){
            echo $formdis;
        }
        ?>

        <div class="box-footer">
            <div class="form-group">
                <?= Html::submitButton(CommonActionLabelEnum::SAVE, ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
