<?php

use backend\models\RequestPick;
use dosamigos\chartjs\ChartJs;


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
    <strong>Kualitas aset </strong>
</p>

<div class="chart" >

    <?= ChartJs::widget([
        'type' => 'bar',
        'options' => [

        ],
        'data' => [
            'labels' => ['Meja', 'Kursi', 'Kayu', 'Laptop'],
            'datasets' => [[
                'type'=>'bar',
                'label'=> 'a',
                'yAxisID'=>"y-axis-0",
                'backgroundColor' => "rgba(217,83,79,0.75)",
                'data' => [500, 500, 350, 200]
            ],
                [
                    'type'=>'bar',
                    'label'=> 'b',
                    'yAxisID'=>"y-axis-0",
                    'backgroundColor' => "rgba(92,184,92,0.75)",
                    'data' => [500, 500, 650, 800]
                ],
                ]
        ],
        'clientOptions' =>
            [
                'options' => [
                    'title'=>[
                        'display' => true,
                    ],
                    'tooltips'=>[
                        'mode'=> 'label'
                    ],
                    'responsive'=> true,
                ],

                'scales'=> [
                    'xAxes'=> [
                        ['stacked'=>true,]
                    ],
                    'yAxes'=>[
                        [
                            'stacked'=>true,
                            'position'=>'left',
                            'id'=> "y-axis-0",
                        ],
                        [
                            'stacked'=>false,
                            'position'=>'right',
                            'id'=> "y-axis-1",
                        ],

                    ]
                ],
            ],
    ]);
    ?>
</div>
<br>

