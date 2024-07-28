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
    $dataListLocation = ArrayHelper::map(\backend\models\Location::find()->asArray()->all(), 'id_location', 'location_name');
    echo $form->field($model, 'id_location')->widget(Select2::classname(), [
        'data' => $dataListLocation,
        'options' => ['placeholder' => '-Pilih-'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Lokasi Penempatan');
    ?>

    <?php 

    function getChildInfo($id_location_unit_parent, &$dataListLocationUnit){
        $locationunits = \backend\models\LocationUnit::find()
                    ->where(['id_location_unit_parent' => $id_location_unit_parent])
                    ->all();
        foreach($locationunits as $locationunit){
            $dataListLocationUnit[$locationunit->id_location_unit] = $locationunit->number_reg." - ".$locationunit->name;

            //GetChild
            $totalChild = \backend\models\LocationUnit::find()
                    ->where(['id_location_unit_parent' => $locationunit->id_location_unit])
                    ->count();
            if($totalChild > 0){
                getChildInfo($locationunit->id_location_unit, $dataListLocationUnit);
            }
        }
    }

    $dataListLocationUnit = [];
    $locationunits = \backend\models\LocationUnit::find()
                ->where(['id_location_unit_parent' => 0])
                ->all();
    foreach($locationunits as $locationunit){
        $dataListLocationUnit[$locationunit->id_location_unit] = $locationunit->number_reg." - ".$locationunit->name;

        //GetChild
        $totalChild = \backend\models\LocationUnit::find()
                ->where(['id_location_unit_parent' => $locationunit->id_location_unit])
                ->count();
        if($totalChild > 0){
            getChildInfo($locationunit->id_location_unit, $dataListLocationUnit);
        }
    }
    echo $form->field($model, 'id_location_unit')->widget(Select2::classname(), [
        'data' => $dataListLocationUnit,
        'options' => ['placeholder' => '-Pilih-'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Ruangan Penempatan');
    ?>

    <?php echo $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    </div>
</div>
