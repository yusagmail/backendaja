<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Location;
use backend\models\LocationUnit;
use common\labeling\CommonActionLabelEnum;
use kartik\select2\Select2;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\LocationUnit */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Update Location Unit: ' . $model->unit_name;
$this->params['breadcrumbs'][] = ['label' => 'Location Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$dataList1 = ['' => '-- Select --'] + ArrayHelper::map(Location::find()->all(), 'id_location', 'location_name');
$locationUnits = LocationUnit::find()
	->where(['!=', 'id_location_unit', $model->id_location_unit]) // Exclude current unit
	->all();


?>

<div class="location-unit-form box box-success">
	<div class="box-header with-border">
		<?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index', 'id' => $model->id_location_unit], ['class' => 'btn btn-warning']) ?>
	</div>
	<div class="box-body">
		<?php $form = ActiveForm::begin(); ?>
	
		
		<?= $form->field($model, 'denah_start_x')->textInput() ?>

		<?= $form->field($model, 'denah_start_y')->textInput() ?>

		<?= $form->field($model, 'denah_panjang')->textInput() ?>

		<?= $form->field($model, 'denah_lebar')->textInput() ?>

		
		<div class="form-group">
			<?= Html::submitButton(CommonActionLabelEnum::SAVE, ['class' => 'btn btn-success']) ?>
		</div>

		<?php ActiveForm::end(); ?>
	</div>
</div>