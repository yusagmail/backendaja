<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DefectaDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="defecta-details-form">

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
    //Mengambil list dari tabel Gudang
    $listAssetMaster = \yii\helpers\ArrayHelper::map(\backend\models\AssetMaster::find()->orderBy([
        'asset_name' => SORT_ASC
        ])->
        asArray()->all(), 'id_asset_master', 'asset_name');
    ?>

    <?= $form->field($model, 'id_asset_master')->dropDownList(
        $listAssetMaster,
        ['prompt' => 'Pilih asset ...']
    ); ?>
    <?php //=$form->field($model, 'id_defecta')->textInput() ?>

    <?= $form->field($model, 'satuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sisa')->textInput() ?>

    <?= $form->field($model, 'pemakaian_sebulan')->textInput() ?>

    <?= $form->field($model, 'kebutuhan')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
