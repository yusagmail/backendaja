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
    $listTotalRoll = array();
    $listTotalYard = array();
    $max = 10;
    $i = 0;
    foreach ($models as $model) {
        //echo $model["tanggal_proses"]." <br>";
        $listLabel[] = ($model["year"]);
        $listTotalRoll[] = $model["total_roll"];
        $listTotalYard[] = $model["total_yard"];
        $i++;
        if($i > $max-1){
            break;
        }
    }
?>
<p class="text-center">
    <strong>Grafik Penjualan Tahunan (<?= $max ?> Tahun Terakhir)</strong>
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
                    'label'=> 'Total Roll',
                    'data' => $listTotalRoll
                ],
                [
                    'backgroundColor' => "rgba(255,27,46,0.3)",
                    'label'=> 'Total Yard',
                    'data' => $listTotalYard
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
                            //'stepSize' => 1000,
                            'beginAtZero' => true
                        ]
                    ]
                ]
            ]
        ],
    ]);?>
</div>
<br>

