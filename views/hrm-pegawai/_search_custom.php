<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use backend\models\HrmKantor;
use backend\models\HrmKantorKategori;
use backend\models\HrmPegawai;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmPegawaiSearch */
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
    #select2-assetitemincident-id_asset_item-results::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #select2-assetitemincident-id_asset_item-results::-webkit-scrollbar
    {
        width: 12px;
        background-color: #F5F5F5;
    }

    #select2-assetitemincident-id_asset_item-results::-webkit-scrollbar-thumb
    {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #555;
    }
</style>


<button class="btn btn-warning btn-flat" data-toggle="collapse" data-target="#demo">Advance Search <i class="fa fa-search"></i></button>

<div id="demo" class="hrm-pegawai-search collapse" style="margin-top: 20px;">
    <?php
    $form = \yii\bootstrap\ActiveForm::begin([
        'layout' => 'horizontal',
        //'action' => ['update-condition'],
        'method' => 'get',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-8',
            ],
        ],
    ]);
    ?>
    <?php
	/*
	$form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); 
	*/
	?>

    <?php // $form->field($model, 'id_pegawai') ?>

    <?php // $form->field($model, 'id_perusahaan') ?>

    <?php // $form->field($model, 'userid') ?>

    <?php // $form->field($model, 'cid') ?>

    <?php // $form->field($model, 'no_dossier') ?>

    <?php  echo $form->field($model, 'NIP') ?>

    <?php  echo $form->field($model, 'nama_lengkap') ?>

   

    <?php

   /* $subQuery = HrmKantor::find()->select(['id_hrm_kantor'])->where(['id_kantor_kategori' => 10]);
    $query = HrmPegawai::find()->where(['NOT IN', 'id_pegawai', $subQuery])->all();

    $pegawai = HrmPegawai::find()
        ->where(['pos_id_hrm_kantor' => $subQuery])
        ->all(); 

    $kantorkategori=HrmKantorKategori::find()->all();
    $listData=ArrayHelper::map($kantorkategori,'kategori','kategori');
    echo $form->field($model,'kategori_kantor')->dropDownList(
            $listData,
            ['prompt'=>'-Pilih-']
            );
    */
    /*
    $kantor=HrmKantorKategori::find()->all();
    $listData=ArrayHelper::map($kantor,'kategori','kategori');
    echo $form->field($model, 'kategori_kantor')->label('Kantor Kategori')->widget(\kartik\select2\Select2::classname(), [
        'data' => $listData,
        'options' => ['placeholder' => '--Pilih--'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    */
    ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'usia') ?>

    <?php // echo $form->field($model, 'usia_lebih_bulan') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'golongan_darah') ?>

    <?php // echo $form->field($model, 'tinggi_badan') ?>

    <?php // echo $form->field($model, 'berat_badan') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'status_pernikahan') ?>

    <?php // echo $form->field($model, 'no_identitas_pribadi') ?>

    <?php // echo $form->field($model, 'NPWP') ?>

    <?php // echo $form->field($model, 'no_kartu_kesehatan') ?>

    <?php // echo $form->field($model, 'no_kartu_tenagakerja') ?>

    <?php // echo $form->field($model, 'kartu_kesehatan') ?>

    <?php // echo $form->field($model, 'no_kartu_keluarga') ?>

    <?php // echo $form->field($model, 'scan_ktp') ?>

    <?php // echo $form->field($model, 'scan_bpjs') ?>

    <?php // echo $form->field($model, 'scan_npwp') ?>

    <?php // echo $form->field($model, 'scan_paraf') ?>

    <?php // echo $form->field($model, 'scan_kk') ?>

    <?php // echo $form->field($model, 'scan_tandatangan') ?>

    <?php // echo $form->field($model, 'id_hrm_status_pegawai') ?>

    <?php // echo $form->field($model, 'id_hrm_status_organik') ?>

    <?php // echo $form->field($model, 'status_tenaga_kerja') ?>

    <?php // echo $form->field($model, 'reg_tanggal_masuk') ?>

    <?php // echo $form->field($model, 'reg_tanggal_diangkat') ?>

    <?php // echo $form->field($model, 'reg_tanggal_training') ?>

    <?php // echo $form->field($model, 'reg_status_pegawai') ?>

    <?php // echo $form->field($model, 'tanggal_mpp') ?>

    <?php // echo $form->field($model, 'tanggal_pensiun') ?>

    <?php // echo $form->field($model, 'tanggal_terminasi') ?>

    <?php // echo $form->field($model, 'id_hrm_mst_jenis_terminasi_bi') ?>

    <?php // echo $form->field($model, 'gelar_akademik') ?>

    <?php // echo $form->field($model, 'gelar_profesi') ?>

    <?php // echo $form->field($model, 'pdk_id_tingkatpendidikan') ?>

    <?php // echo $form->field($model, 'pdk_sekolah_terakhir') ?>

    <?php // echo $form->field($model, 'pdk_jurusan_terakhir') ?>

    <?php // echo $form->field($model, 'pdk_ipk_terakhir') ?>

    <?php // echo $form->field($model, 'pdk_tahun_lulus') ?>

    <?php // echo $form->field($model, 'alamat_termutakhir') ?>

    <?php // echo $form->field($model, 'alamat_sesuai_identitas') ?>

    <?php // echo $form->field($model, 'mobilephone1') ?>

    <?php // echo $form->field($model, 'mobilephone2') ?>

    <?php // echo $form->field($model, 'telepon_rumah') ?>

    <?php // echo $form->field($model, 'fax_rumah') ?>

    <?php // echo $form->field($model, 'email1') ?>

    <?php // echo $form->field($model, 'email2') ?>

    <?php // echo $form->field($model, 'jbt_id_jabatan') ?>

    <?php // echo $form->field($model, 'jbt_jabatan') ?>

    <?php // echo $form->field($model, 'jbt_id_tingkat_jabatan') ?>

    <?php // echo $form->field($model, 'jbt_no_sk_jabatan') ?>

    <?php // echo $form->field($model, 'jbt_tgl_keputusan') ?>

    <?php // echo $form->field($model, 'jbt_tanggal_berlaku') ?>

    <?php // echo $form->field($model, 'jbt_keterangan_mutasi') ?>

    <?php // echo $form->field($model, 'pkt_id_pangkat') ?>

    <?php // echo $form->field($model, 'pkt_no_sk') ?>

    <?php // echo $form->field($model, 'pkt_tgl_keputusan') ?>

    <?php // echo $form->field($model, 'pkt_tgl_berlaku') ?>

    <?php // echo $form->field($model, 'pkt_gaji_pokok') ?>

    <?php // echo $form->field($model, 'pkt_id_jenis_kenaikan_pangkat') ?>

    <?php // echo $form->field($model, 'pkt_eselon') ?>

    <?php // echo $form->field($model, 'pkt_ruang') ?>

    <?php // echo $form->field($model, 'pos_id_hrm_kantor') ?>

    <?php // echo $form->field($model, 'pos_id_hrm_unit_kerja') ?>

    <?php // echo $form->field($model, 'pos_kantor') ?>

    <?php // echo $form->field($model, 'sta_total_hukuman_disiplin') ?>

    <?php // echo $form->field($model, 'sta_total_penghargaan') ?>

    <?php // echo $form->field($model, 'pst_masabakti_20') ?>

    <?php // echo $form->field($model, 'pst_masabakti_25') ?>

    <?php // echo $form->field($model, 'pst_masabakti_30') ?>

    <?php // echo $form->field($model, 'pst_masabakti_35') ?>

    <?php // echo $form->field($model, 'pst_masabakti_40') ?>

    <?php // echo $form->field($model, 'cuti_besar_terakhir_start') ?>

    <?php // echo $form->field($model, 'cuti_besar_terakhir_end') ?>

    <?php // echo $form->field($model, 'cuti_besar_terakhir_ke') ?>

    <?php // echo $form->field($model, 'cuti_besar_plan_1') ?>

    <?php // echo $form->field($model, 'cuti_besar_plan_2') ?>

    <?php // echo $form->field($model, 'cuti_besar_plan_3') ?>

    <?php // echo $form->field($model, 'cuti_besar_plan_4') ?>

    <?php // echo $form->field($model, 'cuti_besar_plan_5') ?>

    <?php // echo $form->field($model, 'cuti_besar_plan_6') ?>

    <?php // echo $form->field($model, 'cuti_besar_plan_7') ?>

    <?php // echo $form->field($model, 'cuti_besar_ambil_1') ?>

    <?php // echo $form->field($model, 'cuti_besar_ambil_2') ?>

    <?php // echo $form->field($model, 'cuti_besar_ambil_3') ?>

    <?php // echo $form->field($model, 'cuti_besar_ambil_4') ?>

    <?php // echo $form->field($model, 'cuti_besar_ambil_5') ?>

    <?php // echo $form->field($model, 'cuti_besar_ambil_6') ?>

    <?php // echo $form->field($model, 'cuti_besar_ambil_7') ?>

    <?php // echo $form->field($model, 'cuti_besar_aktual_1') ?>

    <?php // echo $form->field($model, 'cuti_besar_aktual_2') ?>

    <?php // echo $form->field($model, 'cuti_besar_aktual_3') ?>

    <?php // echo $form->field($model, 'cuti_besar_aktual_4') ?>

    <?php // echo $form->field($model, 'cuti_besar_aktual_5') ?>

    <?php // echo $form->field($model, 'cuti_besar_aktual_6') ?>

    <?php // echo $form->field($model, 'cuti_besar_aktual_7') ?>

    <?php // echo $form->field($model, 'cuti_besar_aktual_end_1') ?>

    <?php // echo $form->field($model, 'cuti_besar_aktual_end_2') ?>

    <?php // echo $form->field($model, 'cuti_besar_aktual_end_3') ?>

    <?php // echo $form->field($model, 'cuti_besar_aktual_end_4') ?>

    <?php // echo $form->field($model, 'cuti_besar_aktual_end_5') ?>

    <?php // echo $form->field($model, 'cuti_besar_aktual_end_6') ?>

    <?php // echo $form->field($model, 'cuti_besar_aktual_end_7') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <?php // echo $form->field($model, 'modified_user') ?>

    <?php // echo $form->field($model, 'modified_ip_address') ?>

	<div class="box-footer clearfix" style="margin-left: 17.5%;">
		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>
	</div>

    <?php //ActiveForm::end(); ?>
	<?php \yii\bootstrap\ActiveForm::end(); ?>

</div>
