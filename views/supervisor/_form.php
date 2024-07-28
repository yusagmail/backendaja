<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Supervisor */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
?>
<style>
    div.required label.control-label:after {
        content: ' *';
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
<div class="supervisor-form box box-primary">
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'class' => 'form-horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-3',
                'wrapper' => 'col-sm-10',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>
    <div class="box-body table-responsive">

       <?php //= $form->field($model, 'id_supervisor')->textInput() ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'NIK')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nomor_telepon')->textInput() ?>

        <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'id_regional')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'id_witel')->textInput(['maxlength' => true]) ?>

        <?php /* $dataListRegional= yii\helpers\ArrayHelper::map(backend\models\Regional::find()->asArray()->all(), 'id_regional', 'treg');
	echo $form->field($model, 'id_regional')->dropDownList($dataListRegional,
		['prompt' => '-Pilih-']); 
	 */?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    
    <?php ActiveForm::end(); ?>
</div>
