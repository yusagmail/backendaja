<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\chartjs\ChartJs;
use yii\helpers\ArrayHelper;

use backend\models\Pelanggaran;
use common\helpers\Timeanddate;
use yii\web\JsExpression;

?>


<?php
    $listLabel = array();
    $listYardAwal = array();
    $listBuang = array();
    $listLabel = ["Product 1","Product 2","Product 3","Product 4"];
    $listYardHasil = [3,2,3,4];
    $listYardAwal = [[2,4],3,4,5];
?>
<p class="text-center">
    <strong>Grafik Bulanan</strong>
</p>

<div class="chart" >

    <?= ChartJs::widget([
        'type' => 'horizontalBar',
        'options' => [
            'height' => 200,
            'width' => 600
        ],
        'data' => [
            'labels' => $listLabel,
            'datasets' => [
                [
                    'backgroundColor' => "rgba(0,0,255,0.3)",
                    'label'=> 'Plan',
                    'data' => $listYardAwal
                ],
                [
                    'backgroundColor' => "rgba(255,27,46,0.3)",
                    'label'=> 'Actual',
                    'data' => $listYardHasil
                ],

            ]
        ],
        'clientOptions' => [
            'indexAxis' => 'y',
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
                        ],
                        'ticks' => [
                            'min' => 0,
                            'stepSize' => 1,
                            'beginAtZero' => true
                        ]
                    ]
                ],

                /*
                'yAxes' => new JsExpression(
                    "
                    [{
                        ticks: {
                            callback: function (value) {
                                const format = value.toString().split('').reverse().join('');
                                const convert = format.match(/\d{1,3}/g);
                                const rupiah = convert.join('.').split('').reverse().join('')
                                return rupiah
                            }
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Jumlah'
                        }
                    }]
                    "
                )
                */

            ],
            'tooltips' => [
                'callbacks' => [
                    'label' => new JsExpression(
                        "function(tooltipItem, data){
                            return tooltipItem.yLabel.toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&.');
                        }"
                    )
                ],
            ],
        ],
    ]);?>
</div>
<br>

