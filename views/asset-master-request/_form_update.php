<?php

use backend\models\AssetMaster;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterRequest */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    div.required label.control-label:after {
        content: ' *';
        color: red;
    }
    .form-group {
        margin-bottom: 0px;
    }
</style>

<?php
//CSS Ini digunakan untuk overide jarak antar form biar tidak terlalu jauh
?>
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

		<?php $dataAssetMaster = ArrayHelper::map(
			\backend\models\AssetMaster::find()->asArray()->all(),
			'id_asset_master',
			function($model) {
				return $model['asset_name'].' - '.$model['asset_code'];
			}
		);
		echo $form->field($model, 'id_asset_master')->widget(Select2::classname(), [
			'data' => $dataAssetMaster,
			'options' => ['placeholder' => 'Pilih Asset'],
			'pluginOptions' => [
				'allowClear' => true
			],
		])->label('Nama Asset'); ?>

        <?= $form->field($model, 'request_date')->textInput()->widget(
            \dosamigos\datepicker\DatePicker::className(), [
            // inline too, not bad
            'inline' => false,
            'id' => 'assetmasterrequest-request_date',
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,

            ]
        ]); ?>
		<?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'request_notes')->textarea(['rows' => 3]) ?>

        
        <?= $form->field($model, 'requested_by')->textInput(['maxlength' => true]) ?>

        <!--    --><?php //$form->field($model, 'requested_user_id')->textInput() ?>

        <!--    --><?php //$form->field($model, 'requested_ip_address')->textInput(['maxlength' => true]) ?>

        <div class="box-footer">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
