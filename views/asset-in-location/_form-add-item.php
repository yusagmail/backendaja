<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AssetItem_Generic;
use backend\models\TypeAssetItem3;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem_Generic */
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

<div class="type-asset1-form box box-success">
    <div class="box-header with-border">
		<?php $form = ActiveForm::begin([
			'layout' => 'horizontal',
			//'action' => ['index1'],
			//'method' => 'get',
			'fieldConfig' => [
				'horizontalCssClasses' => [
					'label' => 'col-sm-3',
					'offset' => 'col-sm-offset-2',
					'wrapper' => 'col-sm-9',
				],
			],
		]); ?>
		
		<?= $form->errorSummary($model); ?>

        <?php
		//echo $varian_group;
        $tableName = AssetItem_Generic::tableName(); //Ini yang diganti (Nama tabel dari modelnya)
        $listElements = AppFieldConfigSearch::getListFormElement($tableName, $form, $model, $varian_group);

		/*
        //Custom Elements (Untuk elemen tertentu yang ingin diganti)
        $elemenStatus = $form->field($model, 'is_active',
            ['wrapperOptions' => ['style' => 'display:inline-block']])
            ->inline(true)
            ->radioList(['1' => CommonActionLabelEnum::ACTIVE, '0' => CommonActionLabelEnum::IN_ACTIVE]);
        $listElements = AppFieldConfigSearch::replaceFormElement($listElements, "is_active", $elemenStatus);
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
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/jquery-3.4.1.min.js"></script>
<script type ="text/javascript">
    $(".type-asset1-form").keyup(function(){
        var label31 = parseInt($("#assetitem_generic-label31").val())
        var label32 = parseInt($("#assetitem_generic-label32").val())
        var label33 = parseInt($("#assetitem_generic-label33").val())

        var total = label31 + label32 + label33;
        $("#assetitem_generic-label34").attr("value",total)

    });
</script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/jquery-3.4.1.min.js"></script>
<script type ="text/javascript">
    $(".type-asset1-form").keyup(function(){
        var label31 = parseInt($("#assetitem_assetmaster10-label31").val())
        var label32 = parseInt($("#assetitem_assetmaster10-label32").val())
        var label33 = parseInt($("#assetitem_assetmaster10-label33").val())

        var total = label31 + label32 + label33;
        $("#assetitem_assetmaster10-label34").attr("value",total)

    });
</script>

<?php /*
<div class="asset-item-create box box-primary">
	<div class="box-body">
<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
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
		<?= $form->errorSummary($model); ?>
	
		<?= $this->render('/asset-item/all/_form_asset_item', [
			'model' => $model,
			'form' => $form,
		]) ?>
		
		
		
	<div class="box-footer">
		<div class="form-group">
			<?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>

        </div>
	</div>
		
	<?php ActiveForm::end(); ?>
	</div>
</div>
*/ ?>
