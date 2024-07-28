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


<div class="chart" >

    <?= ChartJs::widget([
        'type' => 'horizontalBar',
        'options' => [
            'height' => 300,
            'width' => 600
        ],
        'data' => [
            'labels' => ["Meja", "Kursi", "Laptop",],
            'datasets' => [
                [
                    'label' => "Laporan Kerusakan",
                    'backgroundColor' => "rgba(190, 124, 145, 0.8)",
                    'borderColor' => "rgba(179,181,198,1)",
                    'pointBackgroundColor' => "rgba(179,181,198,1)",
                    'pointBorderColor' => "#fff",
                    'pointHoverBackgroundColor' => "#fff",
                    'pointHoverBorderColor' => "rgba(179,181,198,1)",
                    'data' => [65, 59, 80]
                ],
            ]
        ]
    ]);
    ?>
</div>
<br>

