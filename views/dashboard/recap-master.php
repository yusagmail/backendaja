<?php

use backend\models\AssetItemRepairSearch;
use backend\models\AssetItemSearch;
use backend\models\AssetMaster;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = Yii::$app->name;
$this->title = 'Dashboard Per Category';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$logs = AssetMaster::find()
    ->where(['id_asset_master' => 12])
    //->andWhere(['=','log_date',$selecteddate])
    //->andWhere(['log_date'=> '2019-10-12'])
    //->orderBy('log_time DESC')
    ->all();
$val1 = 12; //hardcoded dulu
$val2 = 4; //
$val3 = 5; //
$val4 = 2;
$url1 = Url::to(['/dashboard/detail']);
$url2 = Url::to(['/dashboard/detail']);
$url3 = Url::to(['/dashboard/detail']);
$url4 = Url::to(['/dashboard/detail']);

?>
<script type="text/javascript">

    window.onload = setupRefresh;


    function setupRefresh() {

        setTimeout("refreshPage();", 60000); // milliseconds
        startTime();

    }

    function refreshPage() {
        window.location = location.href;
    }

    function startTime() {
        var dayarray = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday",
            "Friday", "Saturday")
        var dayarrayIndo = new Array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu")
        var montharray = new Array("January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December")
        var montharrayIndo = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
            "Agustus", "September", "Oktober", "November", "Desember")

        var today = new Date();
        // var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
        var date = dayarrayIndo[today.getDay()] + ', ' + today.getDate() + ' ' + montharrayIndo[today.getMonth()] + ' ' + today.getFullYear();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        // document.getElementById('date').innerHTML =
        //     date;
        document.getElementById('date').innerHTML =
            date + " - " + h + ":" + m + ":" + s;

        var t = setTimeout(startTime, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }
        ;  // add zero in front of numbers < 10
        return i;
    }

</script>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-10">


                        <?php
                        $form = ActiveForm::begin([
                            'method' => 'post',
                            'enableClientScript' => false
                        ]);?>
                        <?php
                        //use backend\models\Country;
                        $countries=AssetMaster::find()->all();

                        //use yii\helpers\ArrayHelper;
                        $listData=ArrayHelper::map($countries,'id_asset_master','asset_name');

                        echo $form->field($model, 'name')->dropDownList(
                            $listData,
                            ['prompt'=>'Select...']
                        );
                        ?>
                        <?php $dataAssetMaster = ArrayHelper::map(AssetMaster::find()->asArray()->all(), 'id_asset_master', 'asset_name');
                        echo Select2::widget([
                            'name' => 'Asset Master',
                            'data' => $dataAssetMaster,
                            'value' => '',
                            'addon' => [
                                'prepend' => [
                                    'content' => 'Nama Asset'
                                ],
                            ],
                            'options' => [
                                'placeholder' => 'Pilih Nama Asset ...',
                                'multiple' => false
                            ],
                        ]); ?>



                    </div>
                    <div class="col-md-2">
                        <?php echo Html::submitButton('Submit',['class' => 'btn btn-primary']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
    <!--    --><?php
    //    $model = new RequestPick;
    //    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Total Asset </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green-gradient">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3> <?= AssetItemSearch::getTotalAsset() ?></h3>
                                    <p> Total Aset</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-calculator"></i>
                                </div>
                                <a href="<?= $url1 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-light-blue-gradient">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3> <?= AssetItemSearch::getTotalAssetGodCondition() ?></h3>
                                    <p> Total Aset Kondisi Baik</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-android-checkmark-circle"></i>
                                </div>
                                <a href="<?= $url2 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow-gradient">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3><?= AssetItemSearch::getTotalAssetBadCondition() ?></h3>
                                    <p> Kondisi Kurang Baik</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-alert-circled"></i>
                                </div>
                                <a href="<?= $url3 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red-gradient">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3> <?= AssetItemSearch::getTotalAssetBrokenCondition()?></h3>
                                    <p> Kondisi Rusak</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-close-circled"></i>
                                </div>
                                <a href="<?= $url4 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Laporan Kerusakan </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3> <?= AssetItemRepairSearch::getTotalAssetReport()?></h3>
                                    <p> Total Laporan</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-alert-circled"></i>
                                </div>
                                <a href="<?= $url3 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3> <?= AssetItemRepairSearch::getTotalAssetHandle()?></h3>
                                    <p> Yang sudah Tertangani</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-happy-outline"></i>
                                </div>
                                <a href="<?= $url3 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3> <?= AssetItemRepairSearch::getTotalAssetFollowup()?></h3>
                                    <p> Yang Belum Ada Followup</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-arrow-shrink"></i>
                                </div>
                                <a href="<?= $url3 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-orange">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3> <?= AssetItemRepairSearch::getTotalAssetTodayReport()?></h3>
                                    <p> Laporan Hari Ini</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-document-text"></i>
                                </div>
                                <a href="<?= $url3 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <?= $this->render('graph/_graph1') ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->render('graph/_graph2') ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Grapik Distribusi Aset </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3" >
                            <?= $this->render('graph/_graph3') ?>
                        </div>

                    </div>
                </div>
                <hr>
                <p class="text-center">
                    <strong>Laporan Hari Ini</strong>
                </p>
                <br>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3> <?= AssetItemRepairSearch::getTotalBottom()?></h3>
                                    <p> Jumlah</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-calculator"></i>
                                </div>
                                <a href="<?= $url3 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3><?= AssetItemRepairSearch::getHandleBottom()?></h3>
                                    <p> Tertangani</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-android-alert"></i>
                                </div>
                                <a href="<?= $url3 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3> <?= AssetItemRepairSearch::getFollowupBottom()?></h3>
                                    <p> Belum Followup</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-arrow-shrink"></i>
                                </div>
                                <a href="<?= $url3 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                            <?= $this->render('graph/_graph4') ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php /*
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
	*/ ?>
</section>
