<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\chartjs\ChartJs;
use yii\helpers\ArrayHelper;

use backend\models\Pelanggaran;
use common\helpers\Timeanddate;



?>


<?php
    $models = $dataProvider->getModels();
    $listLabel = array();
    $listYardAwal = array();
    $listBuang = array();
    $listYardHasil = array();
    $max = 10;
    $i = 0;
    foreach ($models as $model) {
        //echo $model["tanggal_proses"]." <br>";
        $listLabel[] = $model["tanggal_proses"];
        $listYardAwal[] = $model["total_yard_awal"];
        $listYardHasil[] = $model["total_yard_hasil"];
        $listBuang[] = $model["total_buang"];
        $i++;
        if($i > $max-1){
            break;
        }
    }
?>
<p class="text-center">
    <strong>Grafik Bulanan</strong>
</p>

<div class="chart" >

    <?= ChartJs::widget([
        'type' => 'bar',
        'options' => [
            'height' => 200,
            'width' => 600
        ],
        'data' => [
            'labels' => $listLabel,
            'datasets' => [
                [
                    'backgroundColor' => "rgba(0,0,255,0.3)",
                    'label'=> 'Yard Awal',
                    'data' => $listYardAwal
                ],
                [
                    'backgroundColor' => "rgba(255,27,46,0.3)",
                    'label'=> 'Yard Hasil',
                    'data' => $listYardHasil
                ],
                [
                    'backgroundColor' => "rgba(255,239,68,0.3)",
                    'label'=> 'Buang',
                    'data' => $listBuang
                ],
            ]
        ],
        'clientOptions' => [
            'legend' => [
                'display' => true,
                //'position' => 'left',
                'border' => true,
                'labels' =>[
                    'fontSize' => 25,
                    'fontColor' => "#425062"
                ]
            ],
            'scales' => [
                'xAxes' => [
                    [
                        'scaleLabel' => [
                            'display' => true,
                            //'labelString' => 'Tanggal'
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
                            'min' => 0,
                            'stepSize' => 100,
                            'beginAtZero' => true
                        ]
                    ]
                ]
            ]
        ],
    ]);?>
</div>
<br>

