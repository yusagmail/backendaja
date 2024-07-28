<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmPegawai */
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
        <div class="col-md-12">
            <?= $form->field($model, 'id_perusahaan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'userid')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'no_dossier')->textInput() ?>

            <?= $form->field($model, 'NIP')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tanggal_lahir')->textInput() ?>

            <?= $form->field($model, 'usia')->textInput() ?>

            <?= $form->field($model, 'usia_lebih_bulan')->textInput() ?>

            <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'golongan_darah')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tinggi_badan')->textInput() ?>

            <?= $form->field($model, 'berat_badan')->textInput() ?>

            <?= $form->field($model, 'agama')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status_pernikahan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'no_identitas_pribadi')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'NPWP')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'no_kartu_kesehatan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'no_kartu_tenagakerja')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'kartu_kesehatan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'no_kartu_keluarga')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'scan_ktp')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'scan_bpjs')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'scan_npwp')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'scan_paraf')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'scan_kk')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'scan_tandatangan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'id_hrm_status_pegawai')->textInput() ?>

            <?= $form->field($model, 'id_hrm_status_organik')->textInput() ?>

            <?= $form->field($model, 'status_tenaga_kerja')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'reg_tanggal_masuk')->textInput() ?>

            <?= $form->field($model, 'reg_tanggal_diangkat')->textInput() ?>

            <?= $form->field($model, 'reg_tanggal_training')->textInput() ?>

            <?= $form->field($model, 'reg_status_pegawai')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tanggal_mpp')->textInput() ?>

            <?= $form->field($model, 'tanggal_pensiun')->textInput() ?>

            <?= $form->field($model, 'tanggal_terminasi')->textInput() ?>

            <?= $form->field($model, 'id_hrm_mst_jenis_terminasi_bi')->textInput() ?>

            <?= $form->field($model, 'gelar_akademik')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'gelar_profesi')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'pdk_id_tingkatpendidikan')->textInput() ?>

            <?= $form->field($model, 'pdk_sekolah_terakhir')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'pdk_jurusan_terakhir')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'pdk_ipk_terakhir')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'pdk_tahun_lulus')->textInput() ?>

            <?= $form->field($model, 'alamat_termutakhir')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'alamat_sesuai_identitas')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'mobilephone1')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'mobilephone2')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'telepon_rumah')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'fax_rumah')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email1')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email2')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'jbt_id_jabatan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'jbt_jabatan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'jbt_id_tingkat_jabatan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'jbt_no_sk_jabatan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'jbt_tgl_keputusan')->textInput() ?>

            <?= $form->field($model, 'jbt_tanggal_berlaku')->textInput() ?>

            <?= $form->field($model, 'jbt_keterangan_mutasi')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'pkt_id_pangkat')->textInput() ?>

            <?= $form->field($model, 'pkt_no_sk')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'pkt_tgl_keputusan')->textInput() ?>

            <?= $form->field($model, 'pkt_tgl_berlaku')->textInput() ?>

            <?= $form->field($model, 'pkt_gaji_pokok')->textInput() ?>

            <?= $form->field($model, 'pkt_id_jenis_kenaikan_pangkat')->textInput() ?>

            <?= $form->field($model, 'pkt_eselon')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'pkt_ruang')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'pos_id_hrm_kantor')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'pos_id_hrm_unit_kerja')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'pos_kantor')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'sta_total_hukuman_disiplin')->textInput() ?>

            <?= $form->field($model, 'sta_total_penghargaan')->textInput() ?>

            <?= $form->field($model, 'pst_masabakti_20')->textInput() ?>

            <?= $form->field($model, 'pst_masabakti_25')->textInput() ?>

            <?= $form->field($model, 'pst_masabakti_30')->textInput() ?>

            <?= $form->field($model, 'pst_masabakti_35')->textInput() ?>

            <?= $form->field($model, 'pst_masabakti_40')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_terakhir_start')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_terakhir_end')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_terakhir_ke')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_plan_1')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_plan_2')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_plan_3')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_plan_4')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_plan_5')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_plan_6')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_plan_7')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_ambil_1')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_ambil_2')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_ambil_3')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_ambil_4')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_ambil_5')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_ambil_6')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_ambil_7')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_aktual_1')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_aktual_2')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_aktual_3')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_aktual_4')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_aktual_5')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_aktual_6')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_aktual_7')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_aktual_end_1')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_aktual_end_2')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_aktual_end_3')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_aktual_end_4')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_aktual_end_5')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_aktual_end_6')->textInput() ?>

            <?= $form->field($model, 'cuti_besar_aktual_end_7')->textInput() ?>

            <?= $form->field($model, 'created_date')->textInput() ?>

            <?= $form->field($model, 'created_user')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'modified_date')->textInput() ?>

            <?= $form->field($model, 'modified_user')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'modified_ip_address')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
