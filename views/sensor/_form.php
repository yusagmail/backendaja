<?php

use backend\models\AssetMaster;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Sensor */
/* @var $form yii\widgets\ActiveForm */
//$listdata=\yii\helpers\ArrayHelper::map(\backend\models\MarketPlace::find()->asArray()->all(), 'id_marketplace', 'marketplace_name');
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
<div class="sensor-form">

    <?php //$form = ActiveForm::begin(); ?>
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
        if ($model->hasErrors()) {
        ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model, ['header' => "Terdapat kesalahan ketika memasukkan informasi"]); ?>
        </div>
        <?php
        }
        ?>

    <?= $form->field($model, 'sensor_name')->textInput(['maxlength' => true]) ?>

    <?php $dataListAssetMaster = ArrayHelper::map(\backend\models\AssetItem::find()->asArray()->all(), 'id_asset_item', 'number1');
    echo $form->field($model, 'id_asset_item')->dropDownList($dataListAssetMaster,
        ['prompt' => '- Pilih -',
            'label' => 'Type Of Supplier']);
    ?>

    <?php /*
    <?= $form->field($model, 'id_marketplace')->label('marketplace Name')->dropDownList(
        $listdata,
        ['prompt'=>'--- Select Marketplace Name ---']
    ); ?>
    */ ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'imei')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?>

<!--    --><?php //$form->field($model, 'barcode1')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?php //$form->field($model, 'sensor_analog1')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'sensor_analog2')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'sensor_analog3')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'sensor_analog4')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'sensor_analog5')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'sensor_analog6')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'sensor_digital1')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'sensor_digital2')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'sensor_digital3')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'sensor_digital4')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'sensor_digital5')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'sensor_digital6')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'last_update')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'last_user_update')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'last_update_ip_address')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?php //$form->field($model, 'token')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?php //$form->field($model, 'flag_new_changes')->textInput() ?>
<!---->
<!--    --><?php //$form->field($model, 'flag_ack_devices')->textInput() ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
