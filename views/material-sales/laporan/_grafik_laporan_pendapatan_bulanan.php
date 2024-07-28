<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\chartjs\ChartJs;
use yii\helpers\ArrayHelper;
use common\helpers\Timeanddate;
use yii\helpers\VarDumper;
use yii\web\JsExpression;

?>

<?php
    $models = $dataProvider->getModels();
    $listLabel = array();
    $listTotalPendapatan = array();
    //$listTotalYard = array();
    $max = 10;
    $i = 0;
    foreach ($models as $model) {
        //echo $model["tanggal_proses"]." <br>";
        $listLabel[] = common\helpers\Timeanddate::getMonthYearSortIndo($model["month"], $model["year"]);
        $listTotalPendapatan[] = $model["total_pendapatan"];
        //$listTotalYard[] = $model["total_yard"];
        $i++;
        if($i > $max-1){
            break;
        }
    }
?>
<p class="text-center">
    <strong>Grafik Pendapatan Bulanan (<?= $max ?> Bulan Terakhir)</strong>
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
                    'backgroundColor' => "rgba(0,255,0,0.3)",
                    'label'=> 'Total Pendapatan',
                    'data' => $listTotalPendapatan
                ],
                /*
                [
                    'backgroundColor' => "rgba(255,27,46,0.3)",
                    'label'=> 'Total Yard',
                    'data' => $listTotalYard
                ],
                */
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

                'yAxes' => new JsExpression(
                    "
                    [{
                        ticks: {
                            callback: function (value) {
                                const format = value.toString().split('').reverse().join('');
                                const convert = format.match(/\d{1,3}/g);
                                const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')
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
            ],
            'tooltips' => [
                'callbacks' => [
                    'label' => new JsExpression(
                        "function(tooltipItem, data){
                            return 'Rp '+tooltipItem.yLabel.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&.');
                        }"
                    )
                ],
            ],
        ],
    ]);?>
</div>
<br>

