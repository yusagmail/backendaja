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

?>
<p class="text-center">
    <strong>Grafik Harian</strong>
</p>

<div class="chart" >

    <?= ChartJs::widget([
        'type' => 'bar',
        'options' => [
            'height' => 200,
            'width' => 600
        ],
        'data' => [
            'labels' => ["1 Juli", "2 Juli", "3 Juli", "4 Juli"],
            'datasets' => [
                [
                    'backgroundColor' => "rgba(0,0,255,0.3)",
                    'label'=> 'Yard Awal',
                    'data' => [400, 500, 600, 700]
                ],
                [
                    'backgroundColor' => "rgba(255,27,46,0.3)",
                    'label'=> 'Yard Hasil',
                    'data' => [100, 200, 300, 400]
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

