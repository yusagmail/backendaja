<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
//use kartik\date\DatePicker;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmPegawai */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
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
<div class="hrm-pegawai-form box box-primary">
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


    <?= $form->field($model, 'NIP')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'userid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList(
        ['PRIA' => 'PRIA', 'WANITA' => 'WANITA'],['prompt'=>'--PIlih--']
    ) ?>

    <?php
    echo $form->field($model, 'tanggal_lahir')->widget(datepicker::className(),[
                            'model' => $model,
                            'attribute' => 'date',
                            'template' => '{addon}{input}',
                            //'options'=>['readonly'=>'readonly'],
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                                'endDate' =>date('Y-m-d'),
                            ]
                        ]);
    ?>

        <?php /* echo '<label>Tanggal Lahir</label>';
        echo DatePicker::widget([
            'name' => 'tanggal_lahir', 
            'value' => date('d-M-Y', strtotime('+2 days')),
            'options' => ['placeholder' => 'Select issue date ...'],
            'pluginOptions' => [
                'format' => 'dd-M-yyyy',
                'todayHighlight' => true
            ]
        ]);
        */ ?>

        <?= $form->field($model, 'alamat_sesuai_identitas')->textarea(['rows' => 3]) ?>

        <?= $form->field($model, 'mobilephone1')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email1')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'jbt_jabatan')->dropDownList([ 'Teknisi' => 'Teknisi', 
        'Manager Service' => 'Manager Service', 'Petugas Gudang' => 'Petugas Gudang', 'Admin IT' => 'Admin IT'], ['prompt' => '-Pilih-']) ?>

        <?php //= $form->field($model, 'id_supervisor')->textInput(['maxlength' => true]) ?>


        
        <!-- <?php $dataListSupervisor= yii\helpers\ArrayHelper::map(backend\models\Supervisor::find()->asArray()->all(), 'id_supervisor', 'nama_supervisor');
	echo $form->field($model, 'id_supervisor')->dropDownList($dataListSupervisor,
		['prompt' => '-Pilih-']); 
        ?> -->

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
