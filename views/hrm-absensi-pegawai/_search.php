<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmAbsensiPegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-absensi-pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_hrm_absensi_pegawai') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'tanggal_absen') ?>

    <?= $form->field($model, 'id_mst_jenis_absensi') ?>

    <?= $form->field($model, 'waktu_login') ?>

    <?php // echo $form->field($model, 'waktu_logout') ?>

    <?php // echo $form->field($model, 'izin_antara_logout') ?>

    <?php // echo $form->field($model, 'izin_antara_login') ?>

    <?php // echo $form->field($model, 'total_menit_kerja') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <?php // echo $form->field($model, 'modified_id_user') ?>

    <?php // echo $form->field($model, 'modified_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
