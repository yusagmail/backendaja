<?php

use backend\models\AccountCode;
use backend\models\AppFieldConfigSearch;
use backend\models\AssetMaster;
use backend\models\TypeAsset1;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
?>
<style>
    .col-container {
        display: table;
        width: 100%;
    }
    .col {
        display: table-cell;
        padding: 9px;
    }
</style>
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

<div class="asset-master-form box box-success">

    <div class="box-header with-border">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            //'action' => ['index1'],
            //'method' => 'get',
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label' => 'col-xs-3',
                    'offset' => 'col-md-offset-6',
                    'wrapper' => 'col-xs-9',
                ],
            ],
        ]); ?>

        <?php
        $listElements = AppFieldConfigSearch::getListFormElement(AssetMaster::tableName(), $form, $model);

        //Custom Elements
        $dataTypeAsset1 = ArrayHelper::map(TypeAsset1::find()->asArray()->all(), 'id_type_asset', 'type_asset');
        $elementTypeAsset1 = $form->field($model, 'id_type_asset1')->dropDownList($dataTypeAsset1,
            ['prompt' => '- Pilih Jenis -']);
        $listElements = AppFieldConfigSearch::replaceFormElement($listElements, "id_type_asset1", $elementTypeAsset1);

        foreach($listElements as $formdis){
            echo $formdis;
        }
        ?>

        <?php
        /*
        <?= $form->field($model, 'asset_name')->textInput(['maxlength' => true]) ?>

        <?php $dataTypeAsset1 = ArrayHelper::map(AssetCode::find()->asArray()->all(), 'id_asset_code', 'code');
        echo $form->field($model, 'id_asset_code')->dropDownList($dataTypeAsset1,
            ['prompt' => '-Choose a Code-']); ?>

        <?= $form->field($model, 'asset_code')->textInput(['maxlength' => true]) ?>

        <?php $dataTypeAsset1 = ArrayHelper::map(TypeAsset1::find()->asArray()->all(), 'id_type_asset', 'type_asset');
        echo $form->field($model, 'id_type_asset1')->dropDownList($dataTypeAsset1,
            ['prompt' => '-Choose a Type Asset 1-']); ?>

        <?php $dataTypeAsset2 = ArrayHelper::map(TypeAsset2::find()->asArray()->all(), 'id_type_asset', 'type_asset');
        echo $form->field($model, 'id_type_asset2')->dropDownList($dataTypeAsset2,
            ['prompt' => '-Choose a Type Asset 2-']); ?>

        <?php $dataTypeAsset3 = ArrayHelper::map(TypeAsset3::find()->asArray()->all(), 'id_type_asset', 'type_asset');
        echo $form->field($model, 'id_type_asset3')->dropDownList($dataTypeAsset3,
            ['prompt' => '-Choose a Type Asset 3-']); ?>

        <?php $dataTypeAsset4 = ArrayHelper::map(TypeAsset4::find()->asArray()->all(), 'id_type_asset', 'type_asset');
        echo $form->field($model, 'id_type_asset4')->dropDownList($dataTypeAsset4,
            ['prompt' => '-Choose a Type Asset 4-']); ?>

        <?php $dataTypeAsset5 = ArrayHelper::map(TypeAsset5::find()->asArray()->all(), 'id_type_asset', 'type_asset');
        echo $form->field($model, 'id_type_asset5')->dropDownList($dataTypeAsset5,
            ['prompt' => '-Choose a Type Asset 5-']); ?>

        <?= $form->field($model, 'attribute1')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'attribute2')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'attribute3')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'attribute4')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'attribute5')->textInput(['maxlength' => true]) ?>
        */
        ?>
    </div>
</div>
<div class="col-sm-6">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Standard - Akuntansi</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <?php $dataAssetMaster = ArrayHelper::map(AccountCode::find()->asArray()->all(), 'id_account_code', 'account_name');
            echo $form->field($model, 'id_account_code')->widget(Select2::classname(), [
                'data' => $dataAssetMaster,
                'options' => ['placeholder' => 'Pilih Account Name'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Kode Akuntansi'); ?>
            <?php $dataAssetMaster = ArrayHelper::map(\backend\models\MstAccrual::find()->asArray()->all(), 'id_mst_accrual', 'method');
            echo $form->field($model, 'id_mst_accrual')->widget(Select2::classname(), [
                'data' => $dataAssetMaster,
                'options' => ['placeholder' => 'Pilih Method'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Metode Penyusutan'); ?>
            <?= $form->field($model, 'account_umur_economic_age')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'account_residual_value')->textInput(['maxlength' => true]) ?>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
<div class="col-md-6">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Standard - Lainnya</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <?= $form->field($model, 'attribute1')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'attribute2')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'attribute3')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'attribute4')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'attribute5')->textInput(['maxlength' => true]) ?>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
<div class="col-container box">
    <div class="col">
        <div class="box-body">
            <div class="box-footer">
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<?php ActiveForm::end(); ?>


