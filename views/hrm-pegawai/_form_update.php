<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmPegawai */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: ' *';
        color: red;
    }
    .form-group {
        margin-bottom: 0px;
    }
</style>
<div class="hrm-pegawai-form box box-primary">
    <div class="box-header with-border">
        <p>
            <?= Html::a('<< Back', ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
    </div>

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        //'action' => ['index1'],
        //'method' => 'get',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-8',
            ],
        ],
    ]); ?>
    <div class="box-body table-responsive">
        <div class="col-md-12">
<!--            --><?php //$form->field($model, 'id_perusahaan')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'userid')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'cid')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'no_dossier')->textInput() ?>

            <?= $form->field($model, 'NIP')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'tanggal_lahir')->widget(
                \dosamigos\datepicker\DatePicker::className(), [
                // inline too, not bad
                'inline' => false,
                'id' => 'hrmpegawai-tanggal_lahir',
                // modify template for custom rendering
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                ]
            ]); ?>


<!--            --><?php //$form->field($model, 'usia')->textInput() ?>

<!--            --><?php //$form->field($model, 'usia_lebih_bulan')->textInput() ?>

            <?= $form->field($model, 'jenis_kelamin')->dropDownList([ '1' => 'PRIA', '2' => 'WANITA',]) ?>


<!--            --><?php //$form->field($model, 'golongan_darah')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'tinggi_badan')->textInput() ?>

<!--            --><?php //$form->field($model, 'berat_badan')->textInput() ?>

<!--            --><?php //$form->field($model, 'agama')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'status_pernikahan')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'no_identitas_pribadi')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'NPWP')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'no_kartu_kesehatan')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'no_kartu_tenagakerja')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'kartu_kesehatan')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'no_kartu_keluarga')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'scan_ktp')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'scan_bpjs')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'scan_npwp')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'scan_paraf')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'scan_kk')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'scan_tandatangan')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'id_hrm_status_pegawai')->textInput() ?>

<!--            --><?php //$form->field($model, 'id_hrm_status_organik')->textInput() ?>

<!--            --><?php //$form->field($model, 'status_tenaga_kerja')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'reg_tanggal_masuk')->textInput() ?>

<!--            --><?php //$form->field($model, 'reg_tanggal_diangkat')->textInput() ?>

<!--            --><?php //$form->field($model, 'reg_tanggal_training')->textInput() ?>

<!--            --><?php //$form->field($model, 'reg_status_pegawai')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'tanggal_mpp')->textInput() ?>

<!--            --><?php //$form->field($model, 'tanggal_pensiun')->textInput() ?>

<!--            --><?php //$form->field($model, 'tanggal_terminasi')->textInput() ?>

<!--            --><?php //$form->field($model, 'id_hrm_mst_jenis_terminasi_bi')->textInput() ?>

<!--            --><?php //$form->field($model, 'gelar_akademik')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'gelar_profesi')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'pdk_id_tingkatpendidikan')->textInput() ?>

<!--            --><?php //$form->field($model, 'pdk_sekolah_terakhir')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'pdk_jurusan_terakhir')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'pdk_ipk_terakhir')->textInput(['maxlength' => true]) ?>
<!---->
<!--            --><?php //$form->field($model, 'pdk_tahun_lulus')->textInput() ?>

<!--            --><?php //$form->field($model, 'alamat_termutakhir')->textarea(['rows' => 6]) ?>

<!--            --><?php //$form->field($model, 'alamat_sesuai_identitas')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'mobilephone1')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'mobilephone2')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'telepon_rumah')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'fax_rumah')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email1')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'email2')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'jbt_id_jabatan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'jbt_jabatan')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'jbt_id_tingkat_jabatan')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'jbt_no_sk_jabatan')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'jbt_tgl_keputusan')->textInput() ?>

<!--            --><?php //$form->field($model, 'jbt_tanggal_berlaku')->textInput() ?>

<!--            --><?php //$form->field($model, 'jbt_keterangan_mutasi')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'pkt_id_pangkat')->textInput() ?>

<!--            --><?php //$form->field($model, 'pkt_no_sk')->textInput(['maxlength' => true]) ?>
<!---->
<!--            --><?php //$form->field($model, 'pkt_tgl_keputusan')->textInput() ?>

<!--            --><?php //$form->field($model, 'pkt_tgl_berlaku')->textInput() ?>

<!--            --><?php //$form->field($model, 'pkt_gaji_pokok')->textInput() ?>

<!--            --><?php //$form->field($model, 'pkt_id_jenis_kenaikan_pangkat')->textInput() ?>

<!--            --><?php //$form->field($model, 'pkt_eselon')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'pkt_ruang')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'pos_id_hrm_kantor')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'pos_id_hrm_unit_kerja')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'pos_kantor')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'sta_total_hukuman_disiplin')->textInput() ?>

<!--            --><?php //$form->field($model, 'sta_total_penghargaan')->textInput() ?>

<!--            --><?php //$form->field($model, 'pst_masabakti_20')->textInput() ?>

<!--            --><?php //$form->field($model, 'pst_masabakti_25')->textInput() ?>

<!--            --><?php //$form->field($model, 'pst_masabakti_30')->textInput() ?>

<!--            --><?php //$form->field($model, 'pst_masabakti_35')->textInput() ?>

<!--            --><?php //$form->field($model, 'pst_masabakti_40')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_terakhir_start')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_terakhir_end')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_terakhir_ke')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_plan_1')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_plan_2')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_plan_3')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_plan_4')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_plan_5')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_plan_6')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_plan_7')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_ambil_1')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_ambil_2')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_ambil_3')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_ambil_4')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_ambil_5')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_ambil_6')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_ambil_7')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_aktual_1')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_aktual_2')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_aktual_3')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_aktual_4')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_aktual_5')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_aktual_6')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_aktual_7')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_aktual_end_1')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_aktual_end_2')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_aktual_end_3')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_aktual_end_4')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_aktual_end_5')->textInput() ?>

<!--            --><?php //$form->field($model, 'cuti_besar_aktual_end_6')->textInput() ?>
<!---->
<!--            --><?php //$form->field($model, 'cuti_besar_aktual_end_7')->textInput() ?>

<!--            --><?php //$form->field($model, 'created_date')->textInput() ?>

<!--            --><?php //$form->field($model, 'created_user')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'modified_date')->textInput() ?>

<!--            --><?php //$form->field($model, 'modified_user')->textInput(['maxlength' => true]) ?>

<!--            --><?php //$form->field($model, 'modified_ip_address')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
