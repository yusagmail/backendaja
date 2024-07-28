<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MutasiStockItem */
/* @var $form yii\widgets\ActiveForm */
?>

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

<div class="mutasi-stock-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-2',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-10',
            ],
        ],
    ]); ?>

    <?php //= $form->field($model, 'id_mutasi_stock')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'id_material_finish')->textInput(['maxlength' => true]) ?>

    <?php
    	$dataMaterialFinish = \yii\helpers\ArrayHelper::map(\backend\models\MaterialFinish::find()
    		->where(['id_gudang'=>$modelParent->id_gudang_asal])
    		->orderBy([
        	'kode' => SORT_ASC
        ])->
        asArray()->all(), 'id_material_finish', 'kode');
    ?>

    <?= $form->field($model, 'id_material_finish')->dropDownList(
        $dataMaterialFinish,
        ['prompt' => 'Pilih Barang Jadi...']
    ); ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
