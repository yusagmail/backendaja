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
$buildings = LocationUnit::find()->where(['id_location_unit_parent' => 0])->all();

?>

<div class="location-unit-form box box-success">
    <div class="box-header with-border">
        <?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
    </div>
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_location')->dropDownList($dataList1, ['prompt' => 'Select Location']) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'unit_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'number_reg')->textInput(['maxlength' => true]) ?>


        <div class="form-group">
            <label for="building">Building</label>
            <?= Select2::widget([
                'name' => 'building',
                'data' => ArrayHelper::map($buildings, 'id_location_unit', 'name'),
                'options' => ['placeholder' => 'Select Building ...', 'id' => 'building'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <div class="form-group">
            <label for="floor">Floor</label>
            <?= Select2::widget([
                'name' => 'floor',
                'data' => [],
                'options' => ['placeholder' => 'Select Floor ...', 'id' => 'floor'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <?= $form->field($model, 'id_location_unit_parent')->hiddenInput(['value' => 0])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton(CommonActionLabelEnum::SAVE, ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php
$script = <<< JS
    $('#building').change(function() {
        var buildingId = $(this).val();
        if (buildingId) {
            $.ajax({
                url: 'get-floors',
                data: { id: buildingId },
                success: function(data) {
                    $('#floor').html(data).trigger('change');
                }
            });
        } else {
            $('#floor').html('<option value="">Select Floor</option>').trigger('change');
        }
    });

    $('#floor').change(function() {
        var floorId = $(this).val();
        if (floorId) {
            $('#locationunit-id_location_unit_parent').val(floorId);
        } else {
            var buildingId = $('#building').val();
            $('#locationunit-id_location_unit_parent').val(buildingId ? buildingId : 0);
        }
    });

    // Ensure correct parent ID is set on submit
    $('form').on('beforeSubmit', function(e) {
        var floorId = $('#floor').val();
        var buildingId = $('#building').val();
        if (floorId) {
            $('#locationunit-id_location_unit_parent').val(floorId);
        } else if (buildingId) {
            $('#locationunit-id_location_unit_parent').val(buildingId);
        } else {
            $('#locationunit-id_location_unit_parent').val(0);
        }
    });
JS;
$this->registerJs($script);
?>