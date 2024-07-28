<?php

use dosamigos\chartjs\ChartJs;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HrmPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Absensi Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-pegawai-index">
    <div class="box box-primary">
        <div class="box-body table-responsive no-padding">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'layout' => "{items}\n{summary}\n{pager}",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//                'id_pegawai',
//                'id_perusahaan',
//                'userid',
//                'cid',
//                'no_dossier',
                    'NIP',
                    'nama_lengkap',
                    // 'foto',
                    // 'tempat_lahir',
                    // 'tanggal_lahir',
                    // 'usia',
                    // 'usia_lebih_bulan',
                    // 'jenis_kelamin',
                    // 'golongan_darah',
                    // 'tinggi_badan',
                    // 'berat_badan',
                    // 'agama',
                    // 'status_pernikahan',
                    // 'no_identitas_pribadi',
                    // 'NPWP',
                    // 'no_kartu_kesehatan',
                    // 'no_kartu_tenagakerja',
                    // 'kartu_kesehatan',
                    // 'no_kartu_keluarga',
                    // 'scan_ktp',
                    // 'scan_bpjs',
                    // 'scan_npwp',
                    // 'scan_paraf',
                    // 'scan_kk',
                    // 'scan_tandatangan',
                    // 'id_hrm_status_pegawai',
                    // 'id_hrm_status_organik',
                    // 'status_tenaga_kerja',
                    // 'reg_tanggal_masuk',
                    // 'reg_tanggal_diangkat',
                    // 'reg_tanggal_training',
                    // 'reg_status_pegawai',
                    // 'tanggal_mpp',
                    // 'tanggal_pensiun',
                    // 'tanggal_terminasi',
                    // 'id_hrm_mst_jenis_terminasi_bi',
                    // 'gelar_akademik',
                    // 'gelar_profesi',
                    // 'pdk_id_tingkatpendidikan',
                    // 'pdk_sekolah_terakhir',
                    // 'pdk_jurusan_terakhir',
                    // 'pdk_ipk_terakhir',
                    // 'pdk_tahun_lulus',
                    // 'alamat_termutakhir:ntext',
//                'alamat_sesuai_identitas:ntext',
                    'mobilephone1',
                    // 'mobilephone2',
                    // 'telepon_rumah',
                    // 'fax_rumah',
//                'email1:email',
                    // 'email2:email',
                    // 'jbt_id_jabatan',
                    // 'jbt_jabatan',
                    // 'jbt_id_tingkat_jabatan',
                    // 'jbt_no_sk_jabatan',
                    // 'jbt_tgl_keputusan',
                    // 'jbt_tanggal_berlaku',
                    // 'jbt_keterangan_mutasi',
                    // 'pkt_id_pangkat',
                    // 'pkt_no_sk',
                    // 'pkt_tgl_keputusan',
                    // 'pkt_tgl_berlaku',
                    // 'pkt_gaji_pokok',
                    // 'pkt_id_jenis_kenaikan_pangkat',
                    // 'pkt_eselon',
                    // 'pkt_ruang',
                    // 'pos_id_hrm_kantor',
                    // 'pos_id_hrm_unit_kerja',
                    // 'pos_kantor',
                    // 'sta_total_hukuman_disiplin',
                    // 'sta_total_penghargaan',
                    // 'pst_masabakti_20',
                    // 'pst_masabakti_25',
                    // 'pst_masabakti_30',
                    // 'pst_masabakti_35',
                    // 'pst_masabakti_40',
                    // 'cuti_besar_terakhir_start',
                    // 'cuti_besar_terakhir_end',
                    // 'cuti_besar_terakhir_ke',
                    // 'cuti_besar_plan_1',
                    // 'cuti_besar_plan_2',
                    // 'cuti_besar_plan_3',
                    // 'cuti_besar_plan_4',
                    // 'cuti_besar_plan_5',
                    // 'cuti_besar_plan_6',
                    // 'cuti_besar_plan_7',
                    // 'cuti_besar_ambil_1',
                    // 'cuti_besar_ambil_2',
                    // 'cuti_besar_ambil_3',
                    // 'cuti_besar_ambil_4',
                    // 'cuti_besar_ambil_5',
                    // 'cuti_besar_ambil_6',
                    // 'cuti_besar_ambil_7',
                    // 'cuti_besar_aktual_1',
                    // 'cuti_besar_aktual_2',
                    // 'cuti_besar_aktual_3',
                    // 'cuti_besar_aktual_4',
                    // 'cuti_besar_aktual_5',
                    // 'cuti_besar_aktual_6',
                    // 'cuti_besar_aktual_7',
                    // 'cuti_besar_aktual_end_1',
                    // 'cuti_besar_aktual_end_2',
                    // 'cuti_besar_aktual_end_3',
                    // 'cuti_besar_aktual_end_4',
                    // 'cuti_besar_aktual_end_5',
                    // 'cuti_besar_aktual_end_6',
                    // 'cuti_besar_aktual_end_7',
                    // 'created_date',
                    // 'created_user',
                    // 'created_ip_address',
                    // 'modified_date',
                    // 'modified_user',
                    // 'modified_ip_address',

//                ['class' => 'yii\grid\ActionColumn'],
                    ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
                ],
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Laporan Bulanan</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">

                                <p class="text-center">
                                    <strong>Bulan <?= Html::encode(\app\common\helpers\Timeanddate::getMonthIndo(\app\common\helpers\Timeanddate::getCurrentMonth())) ?>
                                        <?= Html::encode(\app\common\helpers\Timeanddate::getCurrentYear()) ?>
                                    </strong>
                                </p>
                                <div class="chart">
                                    <!--                                    <canvas id="lineChart" style="height:250px"></canvas>-->
                                    <?php
                                    foreach ($bulanan as $model) {
//                                        $dateList[] = $model->tgl_absensi;
                                        $dateList[] = explode('-', $model->tgl_absensi)[2];
                                        $presentList[] = $model->jml_sdh_presensi;
                                        $notPresentList[] = $model->jml_blm_presensi;
                                        $latePresentList[] = $model->jml_terlambat;
                                    }

                                    $day = $dateList;
                                    $present = $presentList;
                                    $notpresent = $notPresentList;
                                    $late = $latePresentList;
                                    ?>
                                    <?= ChartJs::widget([
                                        'type' => 'line',
                                        'options' => [
                                            'height' => 300,
//                                        'width' => 400
                                        ],
                                        'clientOptions' => [
                                            'scales' => [
                                                'xAxes' => [
                                                    [
                                                        'scaleLabel' => [
                                                            'display' => true,
                                                            'labelString' => 'Tanggal'
                                                        ]
                                                    ]
                                                ],
                                                'yAxes' => [
                                                    [
                                                        'scaleLabel' => [
                                                            'display' => true,
                                                            'labelString' => 'Jumlah'
                                                        ],
                                                        'ticks' => [
//                                                        'min' => 0,
                                                            'stepSize' => 1,
                                                            'beginAtZero' => true
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ],
                                        'data' => [
//                                            'labels' => ["January", "February", "March", "April", "May", "June", "July"],
                                            'labels' => $day,
                                            'datasets' => [
                                                [
                                                    'label' => "Presensi",
                                                    'backgroundColor' => "rgba(31,255,38,0.3)",
//                                                    'backgroundColor' => "rgba(0,0,0,0)",
                                                    'borderColor' => "rgba(31,255,38,1)",
                                                    'pointBackgroundColor' => "rgba(31,255,38,1)",
                                                    'pointBorderColor' => "#0f0",
                                                    'pointHoverBackgroundColor' => "#0f0",
                                                    'pointHoverBorderColor' => "rgba(0,200,10,1)",
                                                    'data' => $present
                                                ],
                                                [
                                                    'label' => "Tidak Presensi",
                                                    'backgroundColor' => "rgba(255,27,46,0.3)",
//                                                    'backgroundColor' => "rgba(0,0,0,0)",
                                                    'borderColor' => "rgba(255,27,46,1)",
                                                    'pointBackgroundColor' => "rgba(255,27,46,1)",
                                                    'pointBorderColor' => "#ff1a21",
                                                    'pointHoverBackgroundColor' => "#ff1a21",
                                                    'pointHoverBorderColor' => "rgba(151,187,205,1)",
                                                    'data' => $notpresent
                                                ],
                                                [
                                                    'label' => "Terlambat",
                                                    'backgroundColor' => "rgba(255,239,68,0.3)",
//                                                    'backgroundColor' => "rgba(0,0,0,0)",
                                                    'borderColor' => "rgba(255,239,68,1)",
                                                    'pointBackgroundColor' => "rgba(255,239,68,1)",
                                                    'pointBorderColor' => "#fff942",
                                                    'pointHoverBackgroundColor' => "#ffef36",
                                                    'pointHoverBorderColor' => "rgba(151,187,205,1)",
                                                    'data' => $late
                                                ],
                                            ]
                                        ]
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <p class="text-center"><strong>Statistik</strong></p>
                            <div class="box-body">
                                <div class="row">
                                    <!-- /.info-box -->

                                    <div class="info-box bg-green">
                                        <span class="info-box-icon"><i class="fa fa-check-circle"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Rata-rata masuk</span>
                                            <span class="info-box-number">
                                                <?php
                                                $masuk = 0;
                                                $karyawan = 0;
                                                foreach ($bulanan as $bulan) {
                                                    $masuk = $masuk + $bulan->jml_sdh_presensi;
                                                    $karyawan = $karyawan + $bulan->jml_pegawai_harus_hadir;
                                                }
                                                echo round($masuk / sizeof($bulanan), 0);
                                                ?>

                                                <i class="ion ion-person"></i></span>

                                            <div class="progress">
                                                <div class="progress-bar" style="width: <?php
                                                echo $masuk / $karyawan * 100;
                                                ?>%"></div>
                                            </div>
                                            <span class="progress-description">
                                                <?php
                                                echo round($masuk / $karyawan * 100, 2);
                                                ?> %
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>

                                    <div class="info-box bg-red">
                                        <span class="info-box-icon"><i class="fa fa-times-circle"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Rata-rata tidak masuk</span>
                                            <span class="info-box-number">
                                                <?php
                                                $tidakmasuk = 0;
                                                foreach ($bulanan as $bulan) {
                                                    $tidakmasuk = $tidakmasuk + $bulan->jml_blm_presensi + $bulan->jml_ijin_tidak_masuk;
                                                }
                                                echo round($tidakmasuk / sizeof($bulanan), 0);
                                                ?>

                                                <i class="ion ion-person"></i></span>

                                            <div class="progress">
                                                <div class="progress-bar" style="width:  <?php
                                                echo $tidakmasuk / $karyawan * 100;
                                                ?>%"></div>
                                            </div>
                                            <span class="progress-description">
                                                <?php
                                                echo round($tidakmasuk / $karyawan * 100, 2);
                                                ?> %
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>

                                    <div class="info-box bg-yellow-active" style="height: 20px">
                                        <span class="info-box-icon"><i class="fa fa-clock-o"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Rata-rata terlambat</span>
                                            <span class="info-box-number">
                                                <?php
                                                $terlambat = 0;
                                                foreach ($bulanan as $bulan) {
                                                    $terlambat = $terlambat + $bulan->jml_terlambat;
                                                }
                                                echo round($terlambat / sizeof($bulanan), 0, PHP_ROUND_HALF_UP);
                                                ?>
                                                <i class="ion ion-person"></i></span>

                                            <div class="progress">
                                                <div class="progress-bar" style="width: <?php
                                                echo $terlambat / $karyawan * 100;
                                                ?>%"></div>

                                            </div>
                                            <span class="progress-description">
                                                <?php
                                                echo round($terlambat / $karyawan * 100, 2);
                                                ?> %
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
