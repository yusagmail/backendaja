<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use yii\helpers\ArrayHelper;
use backend\models\AssetMaster;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem */
/* @var $form yii\widgets\ActiveForm */

$this->title = CommonActionLabelEnum::CREATE . ' ' . AppVocabularySearch::getValueByKey('Asset Item');
$this->params['breadcrumbs'][] = ['label' => 'Asset Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$dataList1 = ['' => '-- Pilih --'] + ArrayHelper::map(AssetMaster::find()->all(), 'id_asset_master', 'asset_name');
?>
<div class="asset-item-create box box-success">
    <div class="box-header with-border">
        <?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>

    </div>
    <div class="box-body">
        <div class="asset-item-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'id_asset_master')->dropDownList($dataList1, ['prompt' => '--Pilih--']) ?>

            <?= $form->field($model, 'number3')->textInput(['maxlength' => true]) ?>

            <!-- other fields -->

            <div class="form-group">
                <?= Html::submitButton(CommonActionLabelEnum::SAVE, ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>