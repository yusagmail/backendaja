<?php

use dosamigos\chartjs\ChartJs;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: Dany Panggabean
 * Date: 15/03/2019
 * Time: 12:53
 */

$this->title = 'Laporan Karyawan - ' . $karyawan->nama_lengkap;;
$this->params['breadcrumbs'][] = ['label' => 'Data Absensi Pegawai', 'url' => ['absensi']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php

?>
<div class="laporan-karyawan">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Trend Keterlambatan Individu</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <!--                            <div class="col-md-2">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label>Tahun</label>-->
                            <!---->
                            <!--                                    <select class="form-control">-->
                            <!--                                        <option>option 1</option>-->
                            <!--                                        <option>option 2</option>-->
                            <!--                                        <option>option 3</option>-->
                            <!--                                        <option>option 4</option>-->
                            <!--                                        <option>option 5</option>-->
                            <!--                                    </select>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <div class="col-md-6"></div>
                            <div class="col-md-4">
                                <form class="form-horizontal">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Tahun</label>
                                            <div class="col-sm-4">
                                                <?= Html::dropDownList('s_id', null,
                                                    ArrayHelper::map($tahun, 'tahun', 'tahun'), ['class' => 'form-control input-sm']) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-footer -->
                                </form>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <!--                                <p class="text-center">-->
                                <!--                                    <strong>Trend Terlambat</strong>-->
                                <!--                                </p>-->
                                <?= ChartJs::widget([
                                    'type' => 'bar',
                                    'options' => [
                                        'height' => 100,
                                    ],
                                    'clientOptions' => [
                                        'scales' => [
                                            'xAxes' => [
                                                [
                                                    'scaleLabel' => [
                                                        'display' => true,
                                                        'labelString' => 'Bulan'
                                                    ],
                                                    'barPercentage' => 0.5
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
//                                    'labels' => ["January", "February", "March", "April", "May", "June", "July"],
//                                    'labels' => \app\common\helpers\Timeanddate::getlistmonthIndo(),
                                        'labels' => ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                                        'datasets' => [
                                            [
                                                'label' => "Terlambat",
                                                'backgroundColor' => "#FF9900",
                                                'borderColor' => "#FF9900",
//                                                'backgroundColor' => "rgba(179,181,198,0.2)",
//                                                'borderColor' => "rgba(179,181,198,1)",
//                                                'pointBackgroundColor' => "rgba(179,181,198,1)",
//                                                'pointBorderColor' => "#fff",
//                                                'pointHoverBackgroundColor' => "#fff",
//                                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                                'data' => $terlambat
                                            ],
                                        ]
                                    ]
                                ]);
                                ?>
                            </div>
                            <div class="col-md-4">

                                <p class="text-center">
                                    <strong>Key Indicator</strong>
                                </p>
                                <!-- /.progress-group -->
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


            </div>
        </div>

        <!--        TIDAK MASUK -->

        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Trend Tidak Masuk Individu </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-4">
                                <form class="form-horizontal">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Tahun</label>
                                            <div class="col-sm-4">
                                                <?= Html::dropDownList('s_id', null,
                                                    ArrayHelper::map($tahun, 'tahun', 'tahun'), ['class' => 'form-control input-sm']) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-footer -->
                                </form>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <?= ChartJs::widget([
                                    'type' => 'bar',
                                    'options' => [
                                        'height' => 100,
//                                        'width' => 400
                                    ],
                                    'clientOptions' => [
                                        'scales' => [
                                            'xAxes' => [
                                                [
                                                    'scaleLabel' => [
                                                        'display' => true,
                                                        'labelString' => 'Bulan'
                                                    ],
                                                    'barPercentage' => 0.5
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
//                                    'labels' => ["January", "February", "March", "April", "May", "June", "July"],
//                                    'labels' => \app\common\helpers\Timeanddate::getlistmonthIndo(),
                                        'labels' => ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                                        'datasets' => [
                                            [
                                                'label' => "Tidak Masuk",
                                                'backgroundColor' => "#B82E2E",
                                                'borderColor' => "#B82E2E",
//                                                'backgroundColor' => "rgba(179,181,198,0.2)",
//                                                'borderColor' => "rgba(179,181,198,1)",
//                                                'pointBackgroundColor' => "rgba(179,181,198,1)",
//                                                'pointBorderColor' => "#fff",
//                                                'pointHoverBackgroundColor' => "#fff",
//                                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                                'data' => $tdkmasuk
                                            ],
                                        ]
                                    ]
                                ]);
                                ?>
                            </div>
                            <div class="col-md-4">

                                <p class="text-center">
                                    <strong>Key Indicator</strong>
                                </p>

                                <!-- /.progress-group -->
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- ini bar chart  -->

        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pola Keterlambatan</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <form class="form-horizontal">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Tahun</label>
                                            <div class="col-sm-4">
                                                <?= Html::dropDownList('s_id', null,
                                                    ArrayHelper::map($tahun, 'tahun', 'tahun'), ['class' => 'form-control input-sm']) ?>
                                            </div>
                                            <label class="col-sm-2 control-label">Bulan</label>
                                            <div class="col-sm-4">
                                                <select class="form-control">
                                                    <option>-Bulan-</option>
                                                    <option>Januari</option>
                                                    <option>Februari</option>
                                                    <option>Maret</option>
                                                    <option>April</option>
                                                    <option>Mei</option>
                                                    <option>Juni</option>
                                                    <option>Juli</option>
                                                    <option>Agustus</option>
                                                    <option>September</option>
                                                    <option>Oktober</option>
                                                    <option>November</option>
                                                    <option>Desember</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-footer -->
                                </form>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <?= ChartJs::widget([
                                    'type' => 'bar',
                                    'options' => [
                                        'height' => 100,
                                    ],
                                    'clientOptions' => [
                                        'scales' => [
                                            'xAxes' => [
                                                [
                                                    'scaleLabel' => [
                                                        'display' => true,
                                                        'labelString' => 'Hari'
                                                    ],
                                                    'barPercentage' => 0.4
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
                                        'labels' => ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
                                        'datasets' => [
                                            [
                                                'label' => "Terlambat",
                                                'backgroundColor' => "#316395",
                                                'borderColor' => "#316395",
//                                                'backgroundColor' => "rgba(75,192,192,0.4)",
//                                                'borderColor' => "rgba(75,192,192,1)",
                                                'borderCapStyle' => 'butt',
//                                                'pointBackgroundColor' => "rgba(179,181,198,1)",
//                                                'pointBorderColor' => "#fff",
//                                                'pointHoverBackgroundColor' => "#fff",
//                                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                                'fill' => false,
//                                                'lineTension' => 0.1,
                                                'data' => ['2', '3', '5', '4', '3', '6']
                                            ],
                                        ]
                                    ]
                                ]);
                                ?>
                            </div>
                            <div class="col-md-4">

                                <p class="text-center">
                                    <strong>Key Indicator</strong>
                                </p>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- ini statistik barchart keterlambatan-->

        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Statistik Keterlambatan</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <form class="form-horizontal">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Tahun</label>
                                            <div class="col-sm-4">
                                                <?= Html::dropDownList('s_id', null,
                                                    ArrayHelper::map($tahun, 'tahun', 'tahun'), ['class' => 'form-control input-sm']) ?>
                                            </div>
                                            <label class="col-sm-2 control-label">Bulan</label>
                                            <div class="col-sm-4">
                                                <select class="form-control">
                                                    <option>-Bulan-</option>
                                                    <option>Januari</option>
                                                    <option>Februari</option>
                                                    <option>Maret</option>
                                                    <option>April</option>
                                                    <option>Mei</option>
                                                    <option>Juni</option>
                                                    <option>Juli</option>
                                                    <option>Agustus</option>
                                                    <option>September</option>
                                                    <option>Oktober</option>
                                                    <option>November</option>
                                                    <option>Desember</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-footer -->
                                </form>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <?= ChartJs::widget([
                                    'type' => 'bar',
                                    'options' => [
                                        'height' => 100,
                                    ],
                                    'clientOptions' => [
                                        'tooltips' => [
                                            'mode' => 'index',
                                            'intersect' => false
                                        ],
                                        'scales' => [
                                            'xAxes' => [
                                                [
                                                    'stacked' => true,
                                                    'scaleLabel' => [
                                                        'display' => true,
                                                        'labelString' => 'Hari'
                                                    ]
                                                ]
                                            ],
                                            'yAxes' => [
                                                [
                                                    'stacked' => true,
                                                    'scaleLabel' => [
                                                        'display' => true,
                                                        'labelString' => 'Menit'
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
                                        'labels' => ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
                                        'datasets' => [
                                            [
                                                'label' => "Data 1",
                                                'pointBackgroundColor' => "rgba(179,181,198,1)",
                                                'pointBorderColor' => "#fff",
                                                'pointHoverBackgroundColor' => "#fff",
                                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                                'fill' => false,
                                                'backgroundColor' => "rgba(75,192,192,0.4)",
                                                'borderColor' => "rgba(75,192,192,1)",
                                                'borderCapStyle' => 'butt',
                                                'data' => ['3', '5', '4', '3', '6', '2']
                                            ],
                                            [
                                                'label' => "Data 2",
                                                'pointBackgroundColor' => "rgba(179,181,198,1)",
                                                'pointBorderColor' => "#fff",
                                                'pointHoverBackgroundColor' => "#fff",
                                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                                'fill' => false,
                                                'backgroundColor' => "rgba(192,192,75,0.4)",
                                                'borderColor' => "rgba(75,192,192,1)",
                                                'borderCapStyle' => 'butt',
                                                'data' => ['2', '3', '5', '4', '3', '6']
                                            ],
                                            [
                                                'label' => "Data 3",
                                                'pointBackgroundColor' => "rgba(179,181,198,1)",
                                                'pointBorderColor' => "#fff",
                                                'pointHoverBackgroundColor' => "#fff",
                                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                                'fill' => false,
                                                'backgroundColor' => "rgba(192,75,192,0.4)",
                                                'borderColor' => "rgba(75,192,192,1)",
                                                'borderCapStyle' => 'butt',
                                                'data' => ['5', '4', '3', '6', '3', '3']
                                            ],
                                        ]
                                    ]
                                ]);
                                ?>
                            </div>
                            <div class="col-md-4">

                                <p class="text-center">
                                    <strong>Key Indicator</strong>
                                </p>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

