<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use backend\models\AssetMaster;
use backend\models\TypeAssetItem1;
use backend\models\TypeAssetItem2;
// use backend\models\Sensor;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .form-group {
        margin-bottom: 0px;
    }
    .label-class-red{
        color : red;
    }
</style>
<div class="as">

    <?php// $form = ActiveForm::begin(); ?>

    <?php
    if ($model->hasErrors()) {
    ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model); ?>
        </div>
    <?php
    }
    ?>

    <?php //= $form->field($model, 'id_asset_master')->textInput() ?>
	
	<?php $dataListAssetMaster = ArrayHelper::map(AssetMaster::find()->asArray()->all(), 'id_asset_master', 'asset_name');
	echo $form->field($model, 'id_asset_master')->dropDownList($dataListAssetMaster,
		['prompt' => '-Pilih-']); 
	?>
	

    <?= $form->field($model, 'number1')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'number2')->textInput(['maxlength' => true]) ?>
	

    <?php $listData = ArrayHelper::map(TypeAssetItem1::find()->asArray()->all(), 'id_type_asset_item', 'type_asset_item');
        echo $form->field($model, 'id_type_asset_item1')->dropDownList($listData,
            ['prompt' => '-Pilih Type-']); ?>

    <?php $listData2 = ArrayHelper::map(TypeAssetItem2::find()->asArray()->all(), 'id_type_asset_item', 'type_asset_item');
        echo $form->field($model, 'id_type_asset_item2')->dropDownList($listData2,
            ['prompt' => '-Pilih Status-']); ?>


     <?php //= $form->field($model, 'id_customer')->textInput(['maxlength' => true]) ?> 


</div>
