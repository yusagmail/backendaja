<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\chartjs\ChartJs;
use yii\helpers\ArrayHelper;

use backend\models\RequestPick;
use common\helpers\Timeanddate;



?>


<?php
//$urlpost = Url::toRoute(['sa-answer-certificate/receiveanswer']);

//Untuk generate datanya
//Difilter per device dan per tanggal
// (Sementara auntuk tanggal harcode dulu karena filternya belum dibuat)
//$logs = RequestPick::find()
//    ->Where(['id_request_pick'])
//    ->andWhere(['log_date'=> '2019-07-24'])
//    ->orderBy('log_time DESC')
//    ->all();
//$sumbu_x_data = array();
//$sumbu_y_data = array();
//foreach($logs as $log){
//Label Sumbu X
//    $sumbu_x_data[] = Timeanddate::getTimeOnly($log->log_time);
//    $sumbu_y_data[] = $log->value2;
//}
?>
<p class="text-center">
    <strong>Grafik 8 Item Barang Yang Sering Dilaporkan </strong>
</p>

<div class="chart" >

    <?= ChartJs::widget([
            'type' => 'pie',
            'id' => 'structurePie',
            'options' => [
                'height' => 300,
                'width' => 600,
            ],
            'data' => [
                'radius' =>  "90%",
                'labels' => ['Meja', 'Kursi', 'Laptop'], // Your labels
                'datasets' => [
                    [
                        'data' => ['35.6', '17.5', '46.9'], // Your dataset
                        'label' => '',
                        'backgroundColor' => [
                            '#ADC3FF',
                            '#FF9A9A',
                            'rgba(190, 124, 145, 0.8)'
                        ],
                        'borderColor' =>  [
                            '#fff',
                            '#fff',
                            '#fff'
                        ],
                        'borderWidth' => 1,
                        'hoverBorderColor'=>["#999","#999","#999"],
                    ]
                ]
            ],
            'clientOptions' => [
                'legend' => [
                    'display' => false,
                    'position' => 'bottom',
                    'labels' => [
                        'fontSize' => 14,
                        'fontColor' => "#425062",
                    ]
                ],
                'tooltips' => [
                    'enabled' => true,
                    'intersect' => true
                ],
                'hover' => [
                    'mode' => false
                ],
                'maintainAspectRatio' => false,
            ],]);?>
</div>
<br>

