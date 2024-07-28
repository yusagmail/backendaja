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

$this->title = CommonActionLabelEnum::CREATE . ' ' . AppVocabularySearch::getValueByKey('Location Unit');
$this->params['breadcrumbs'][] = ['label' => 'Location Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$dataList1 = ['' => '-- Select --'] + ArrayHelper::map(Location::find()->all(), 'id_location', 'location_name');
$locationUnits = LocationUnit::find()->orderBy(['number_reg' => SORT_ASC])->all();
$hierarchicalData = ['0' => '-- None --']; // Add option for no parent

foreach ($locationUnits as $unit) {
    $levels = explode('.', $unit->number_reg);
    $label = str_repeat('-', count($levels) - 1) . ' ' . $unit->unit_name . ' (' . $unit->number_reg . ')';
    $hierarchicalData[$unit->id_location_unit] = $label;
}
?>

<div class="location-unit-form box box-success">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_location')->dropDownList($dataList1, ['prompt' => 'Select Location']) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'unit_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'number_reg')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'denah_start_x')->textInput() ?>

        <?= $form->field($model, 'denah_start_y')->textInput() ?>

        <?= $form->field($model, 'denah_panjang')->textInput() ?>

        <?= $form->field($model, 'denah_lebar')->textInput() ?>

        <?= $form->field($model, 'id_location_unit_parent')->widget(Select2::classname(), [
            'data' => $hierarchicalData,
            'options' => [
                'placeholder' => 'Select Parent Unit',
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton(CommonActionLabelEnum::SAVE, ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
