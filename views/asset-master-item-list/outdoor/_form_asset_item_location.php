<?php

use backend\models\Kabupaten;
use backend\models\Kecamatan;
use backend\models\Kelurahan;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemLocation */
/* @var $form yii\widgets\ActiveForm */
$labelHead = \backend\models\AppVocabularySearch::getValueByKey('Asset Item');
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
    $dataListPoint = ArrayHelper::map(\backend\models\Point::find()->asArray()->all(), 'id_point', 'name');
    echo $form->field($model, 'id_point')->dropDownList($dataListPoint,
        ['prompt' => '-Pilih-',
            'label' => 'Lokasi Titik Penempatan']); 
    ?>

    <?php 
    $dataListSensor = ArrayHelper::map(\backend\models\Sensor::find()->asArray()->all(), 'id_sensor', 'sensor_name');
    echo $form->field($model, 'id_sensor')->dropDownList($dataListSensor,
        ['prompt' => '-Pilih-',
            'label' => 'Sensor Device']); 
    ?>

<?php // echo $form->field($model, 'kodepos')->textInput(['maxlength' => true]) ?>
    </div>
</div>