<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmAbsensiPegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-absensi-pegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //= $form->field($model, 'id_hrm_absensi_pegawai')->textInput() ?>

    <?php //= $form->field($model, 'id_pegawai')->textInput() ?>

    <?php
    $listPegawai = \yii\helpers\ArrayHelper::map(\backend\models\HrmPegawai::find()->asArray()->all(), 'id_pegawai', 'nama_lengkap');
    ?>

    <?= $form->field($model, 'id_pegawai')->dropDownList(
        $listPegawai,
        ['prompt' => 'Pilih Pegawai ...']
    ); ?>

    <?php //= $form->field($model, 'tanggal_absen')->textInput() ?>

    <?php
    echo $form->field($model, 'tanggal_absen')->widget(\dosamigos\datepicker\datepicker::className(),[
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

    <?= $form->field($model, 'id_mst_jenis_absensi')->textInput() ?>

    <?= $form->field($model, 'waktu_login')->textInput() ?>

    <?= $form->field($model, 'waktu_logout')->textInput() ?>

    <?php /*
    <?= $form->field($model, 'izin_antara_logout')->textInput() ?>

    <?= $form->field($model, 'izin_antara_login')->textInput() ?>

    <?= $form->field($model, 'total_menit_kerja')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_date')->textInput() ?>

    <?= $form->field($model, 'modified_id_user')->textInput() ?>

    <?= $form->field($model, 'modified_ip_address')->textInput(['maxlength' => true]) ?>
    */ ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
