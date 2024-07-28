<?php

use backend\models\AppFieldConfigSearch;
use backend\models\Location;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use backend\models\Kabupaten;
use backend\models\Kecamatan;
use backend\models\Kelurahan;
use backend\models\Propinsi;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\labeling\CommonActionLabelEnum;

/* @var $this yii\web\View */
/* @var $model backend\models\Location */
/* @var $form yii\widgets\ActiveForm */
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
<div class="location-form box box-primary">
	<div class="box-header with-border">
        <p>
            <?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
    </div>
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'layout' => 'horizontal',
        //'action' => ['index1'],
        //'method' => 'get',
        'options' => ['encrypt'=>'multipart/form-data'],
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-8',
            ],
        ],
    ]); ?>
    <br>
	
	<?= $form->errorSummary($model); ?>

    <?php
	
    $listElements = AppFieldConfigSearch::getListFormElement(Location::tableName(), $form, $model);
	//Custom Elements - Propinsi
	$dataProvinsi = ArrayHelper::map(Propinsi::find()->orderBy(['nama_propinsi' => SORT_ASC])->asArray()->all(), 'id_propinsi', 'nama_propinsi');
	$elementDropdownPropinsi = $form->field($model, 'id_propinsi')->widget(Select2::classname(), [
		'data' => $dataProvinsi,
		'pluginOptions' => [
			'allowClear' => true
		],
		'options' => [
			'prompt' => 'Pilih Propinsi',
			'onchange' => '
				$.post( "' . Yii::$app->urlManager->createUrl('asset-item-location/lists?id=') . '"+$(this).val(), function( data ) {
				$( "select#location-id_kabupaten" ).html( data );
				});

		']
	])->label('Provinsi');
	$listElements = AppFieldConfigSearch::replaceFormElement($listElements, "id_propinsi", $elementDropdownPropinsi);
	
	
	//Custom Elements - Kabupaten
	$dataKabupaten = ArrayHelper::map(Kabupaten::find()->orderBy(['nama_kabupaten' => SORT_ASC])->asArray()->all(), 'id_kabupaten', 'nama_kabupaten');
	$elementDropdownKabupaten = $form->field($model, 'id_kabupaten')->widget(Select2::classname(), [
		'data' => $dataKabupaten,
		'pluginOptions' => [
			'allowClear' => true
		],
		'options' => [
			'prompt' => 'Pilih Kabupaten',
			'onchange' => '
				$.post( "' . Yii::$app->urlManager->createUrl('asset-item-location/kecamatan?id=') . '"+$(this).val(), function( data ) {
				$( "select#location-id_kecamatan" ).html( data );
				});

		']
	])->label('Kabupaten');
	$listElements = AppFieldConfigSearch::replaceFormElement($listElements, "id_kabupaten", $elementDropdownKabupaten);


	//Custom Elements - Kecamatan
	$dataKecamatan = ArrayHelper::map(Kecamatan::find()->orderBy(['nama_kecamatan' => SORT_ASC])->asArray()->all(), 'id_kecamatan', 'nama_kecamatan');
	$elementDropdownKecamatan = $form->field($model, 'id_kecamatan')->widget(Select2::classname(), [
		'data' => $dataKecamatan,
		'pluginOptions' => [
			'allowClear' => true
		],
		'options' => [
			'prompt' => 'Pilih Kecamatan ...',
			'onchange' => '
				$.post( "' . Yii::$app->urlManager->createUrl('asset-item-location/kelurahan?id=') . '"+$(this).val(), function( data ) {
				$( "select#location-id_kelurahan" ).html( data );
				});

		']
	])->label('Kecamatan');
	$listElements = AppFieldConfigSearch::replaceFormElement($listElements, "id_kecamatan", $elementDropdownKecamatan);


	//Custom Elements - Kelurahan
	$dataKelurahan = ArrayHelper::map(Kelurahan::find()->orderBy(['nama_kelurahan' => SORT_ASC])->asArray()->all(), 'id_kelurahan', 'nama_kelurahan');
	$elementDataKelurahan = $form->field($model, 'id_kelurahan')->widget(Select2::classname(), [
		'data' => $dataKelurahan,
		'options' => ['placeholder' => 'Pilih Kelurahan ...'],
		'pluginOptions' => [
			'allowClear' => true
		],
	])->label('Kelurahan');
	$listElements = AppFieldConfigSearch::replaceFormElement($listElements, "id_kelurahan", $elementDataKelurahan);

    foreach($listElements as $formdis){
        echo $formdis;
    }
    ?>

    <div class="box-footer" style="
    margin-left: 12px;">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
