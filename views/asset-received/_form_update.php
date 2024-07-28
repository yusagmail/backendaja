<?php

use backend\models\AssetMaster;
use backend\models\MstStatusReceived;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetReceived */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
?>
<style>
    div.required label.control-label:after {
        content: ' *';
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

<div class="asset-received-form box box-success">
    <div class="box-header with-border">
        <p>
            <?= Html::a('<< Back', ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
    </div>

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

        <?php $dataAssetMaster = ArrayHelper::map(AssetMaster::find()->asArray()->all(), 'id_asset_master', 'asset_name');
        echo $form->field($model, 'id_asset_master')->dropDownList($dataAssetMaster,
            ['prompt' => '-Choose a Asset Master-']); ?>

        <?= $form->field($model, 'number1')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'number2')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'number3')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'purchasing_invoice_number')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'received_date')->widget(
            \dosamigos\datepicker\DatePicker::className(), [
            // inline too, not bad
            'inline' => false,
            'id' => 'assetreceived-received_date',
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ]
        ]); ?>

        <?= $form->field($model, 'received_year')->dropDownList($model->getYearsList())->label('Tahun Penerimaan'); ?>

        <?= $form->field($model, 'price_received')->textInput(['id'=>'assetreceived-price_received']) ?>

        <?= $form->field($model, 'quantity')->textInput(['id'=>'assetreceived-quantity']) ?>

        <?php $dataStatusReceived = ArrayHelper::map(MstStatusReceived::find()->asArray()->all(), 'id_status_received', 'status_received');
        echo $form->field($model, 'id_status_received')->dropDownList($dataStatusReceived,
            ['prompt' => '-Choose a Status Received-']); ?>

        <div class="box-footer">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("#assetreceived-price_received").bind('change',function(){
            var value=$(this).val();
            $(this).val(parseInt(value).toFixed(2));
        })
    });

    $(document).ready(function(){
        $("#assetreceived-quantity").bind('change',function(){
            var value=$(this).val();
            $(this).val(parseInt(value).toFixed(2));
        })
    });

</script>
