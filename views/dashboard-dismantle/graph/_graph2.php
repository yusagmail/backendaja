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
    <strong>Grafik 8 Item Barang Yang Sering Dilaporkan </strong>
</p>

<div class="chart" >

    <?= ChartJs::widget([
        'type' => 'bar',
        'options' => [
            'height' => 300,
            'width' => 600
        ],
        'data' => [
            'labels' => ["Meja", "Kursi", "Laptop", "AC"],
            'datasets' => [
                [
                    'label' => "Barang yang Sering Dilaporkan",
                    'backgroundColor' => "rgba(255,99,132,0.2)",
                    'borderColor' => "rgba(255,99,132,1)",
                    'pointBackgroundColor' => "rgba(255,99,132,1)",
                    'pointBorderColor' => "#fff",
                    'pointHoverBackgroundColor' => "#fff",
                    'pointHoverBorderColor' => "rgba(255,99,132,1)",
                    'data' => [28, 48, 40, 19]
                ]
            ]
        ]
    ]);
    ?>
</div>
<br>
