<?php

use backend\models\Kabupaten;
use backend\models\Kecamatan;
use backend\models\Kelurahan;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemLocation */
/* @var $form yii\widgets\ActiveForm */
$labelHead = \backend\models\AppVocabularySearch::getValueByKey('Asset Master');
?>
<div class="box-footer">
    <div class="form-group">
        <h4 class="box-title text-danger">Penempatan <?= $labelHead ?></h4>
<?php
/*
$dataAssetMaster = ArrayHelper::map(AssetMaster::find()->asArray()->all(), 'id_asset_master', 'asset_name');
echo $form->field($model, 'id_asset_master')->dropDownList($dataAssetMaster,
    ['prompt' => '-Choose a Asset-']);
*/
?>


<?php //= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

<?php
/*
$dataAssetMaster = ArrayHelper::map(AssetMaster::find()->asArray()->all(), 'id_asset_master', 'asset_name');
echo $form->field($model, 'id_asset_master')->dropDownList($dataAssetMaster,
    ['prompt' => '-Choose a Asset-']);
*/
?>
    <?php 
    $dataListLocation = ArrayHelper::map(\backend\models\Location::find()->asArray()->all(), 'id_location', 'location_name');
    echo $form->field($model, 'id_location')->dropDownList($dataListLocation,
        ['prompt' => '-Pilih-',
            'label' => 'Lokasi Penempatan']); 
    ?>

    <?php 
    $dataListLocationUnit = ArrayHelper::map(\backend\models\LocationUnit::find()->asArray()->all(), 'id_location_unit', 'unit_name');
    echo $form->field($model, 'id_location_unit')->dropDownList($dataListLocationUnit,
        ['prompt' => '-Pilih-',
            'label' => 'Rak Penempatan']); 
    ?>

    <?php echo $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

<?php // echo $form->field($model, 'kodepos')->textInput(['maxlength' => true]) ?>
    </div>
</div>