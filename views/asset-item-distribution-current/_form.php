<?php

use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemDistributionCurrent */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: ' *';
        color: red;
    }

    .form-group {
        margin-bottom: 2px;
    }

    .field-EMPLOYEED {
        display: none;
    }

    .field-DEPARTEMEN {
        display: none;
    }
</style>
<div class="asset-item-distribution-current-form box box-primary">
    <div class="box-header with-border">
        <p>
            <?= Html::a('<< Back', ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
    </div>
    <div class="box-body">

        <?php $form = \yii\bootstrap\ActiveForm::begin([
            'layout' => 'horizontal',
            //'action' => ['index1'],
            //'method' => 'get',
            'options' => ['encrypt' => 'multipart/form-data'],
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    'offset' => 'col-sm-offset-2',
                    'wrapper' => 'col-sm-10',
                ],
            ],
        ]); ?>
        <?php 
		/*
		$dataAssetMaster = ArrayHelper::map(AssetMaster::find()->asArray()->all(), 'id_asset_master', 'asset_name');
        echo $form->field($model, 'id_asset_item')->widget(Select2::classname(), [
            'data' => $dataAssetMaster,
            'options' => ['placeholder' => 'Pilih Asset'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Nama Asset'); 
		*/
		?>
		
		
		<?php
		$datas = \backend\models\AssetItem::find()
			->orderBy(['id_asset_master'=>SORT_ASC, 'number1'=>SORT_ASC])
			->all();
		$listValueAssetItem = array();
		foreach($datas as $data){
			if(isset($data->assetMaster)){
				$listValueAssetItem[$data->id_asset_item] = $data->assetMaster->asset_name.' - '.$data->number1;
			}else{
				$listValueAssetItem[$data->id_asset_item] = $data->id_asset_master.' - '.$data->number1;
			}
		}
		
		echo $form->field($model, 'id_asset_item')->widget(Select2::classname(), [
			'data' => $listValueAssetItem,
			'options' => ['placeholder' => 'Pilih Asset'],
			'pluginOptions' => [
				'allowClear' => true
			],
		])->label('Nama Asset'); 
		
		?>
        <?php
        echo $form->field($model, 'distribute_to')->dropDownList(
            ['1' => 'EMPLOYEED', '2' => 'DEPARTEMEN', '3' => 'NOT SET'],
            [
                'id' => 'assetitemdistributioncurrent-distribute_to',
                'prompt' => 'Pilih Distribute To'
            ]
        ); ?>
        <?php $dataPegawai = ArrayHelper::map(\backend\models\HrmPegawai::find()->asArray()->all(), 'id_pegawai', 'nama_lengkap');
        echo $form->field($model, 'id_pegawai')->textInput(['id' => 'EMPLOYEED'])->widget(Select2::classname(), [
            'data' => $dataPegawai,
            'options' => [
                'id' => 'EMPLOYEED',
                'placeholder' => 'Pilih Pegawai',
                'onchange' => 'ChangeDropdowns(this.value)',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Nama Pegawai'); ?>

        <?php $dataPegawai = ArrayHelper::map(\backend\models\Departement::find()->asArray()->all(), 'id_departement', 'departement_name');
        echo $form->field($model, 'id_departement')->textInput(['id' => 'DEPARTEMEN'])->widget(Select2::classname(), [
            'data' => $dataPegawai,

            'options' => [
                'id' => 'DEPARTEMEN',
                'placeholder' => 'Pilih Departemen',
                'onchange' => 'ChangeDropdowns(this.value)'
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Nama Departemen'); ?>

        <?php $dataPegawai = ArrayHelper::map(\backend\models\AssetItemLocation::find()->asArray()->all(), 'id_asset_item_location', 'address');
        echo $form->field($model, 'id_asset_item_location')->widget(Select2::classname(), [
            'data' => $dataPegawai,
            'options' => ['placeholder' => 'Pilih Lokasi'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Nama Lokasi'); ?>
        <?php //= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'start_date')->textInput()->widget(
            \dosamigos\datepicker\DatePicker::className(), [
            // inline too, not bad
            'inline' => false,
            'id' => 'start_date',
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'defaultDate' => date('Y-mm-d'),
                'todayHighlight' => true,

            ]
        ]); ?>

        <?php //= $form->field($model, 'start_month')->textInput() ?>

        <?php //= $form->field($model, 'start_year')->textInput() ?>

        <?= $form->field($model, 'duration',['template' => '
   <div >{label}</div>
   <div class="col-sm-10">
       <div class="input-group">{input}
            <span class="input-group-addon">Bulan</span></div>
   </div>'])->textInput(['maxlength' => true]) ?>
        <br>
		<?= $form->field($model, 'notes')->textarea(['row' => 3]) ?>
	</div>
</div>
<div class="row">	
    <div class="col-md-12">		
		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Penyerahan Aset</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <?php /*<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>*/ ?>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
			<?php $dataPegawai = ArrayHelper::map(\backend\models\MstStatusCondition::find()->asArray()->all(), 'id_mst_status_condition', 'condition');
			echo $form->field($model, 'id_mst_status_condition')->widget(Select2::classname(), [
				'data' => $dataPegawai,

				'options' => [

					'placeholder' => 'Pilih Status Condition',
				],
				'pluginOptions' => [
					'allowClear' => true
				],
			]); ?>
		
			<?= $form->field($model, 'handover_by')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'handover_condition_notes')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'handover_photos1')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'handover_photos2')->textInput(['maxlength' => true]) ?>

			

			<div class="box-footer" style="
		margin-left: 12px;">
				<div class="form-group">
					<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
				</div>
			</div>
        </div>
        <!-- /.box-body -->

      </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        $("#assetitemdistributioncurrent-distribute_to").change(function () {
            if ($(this).find(':selected').val() != 2) {
                $("div.field-EMPLOYEED").show();
                $("div.field-DEPARTEMEN").hide();
            } else if ($(this).find(':selected').val() != 1) {
                $("div.field-EMPLOYEED").hide();
                $("div.field-DEPARTEMEN").show();
            } else if ($(this).find(':selected').val() != 3) {
                $("div.field-EMPLOYEED").show();
                $("div.field-DEPARTEMEN").show();
            } else {
                $("div.field-EMPLOYEED").show();
                $("div.field-DEPARTEMEN").show();
            }
        });
    });
</script>
