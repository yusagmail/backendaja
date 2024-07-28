<?php
use dosamigos\chartjs\ChartJs;
use backend\models\Supplier;
use backend\models\RequestPick;
?>

<?php
	//Perhitungannya ada di sini
	$datas = RequestPick::find()
		->select(['*, count(id_request_pick) as total'])
        ->where(['status' => 'REQUEST'])
        //->orderBy('userid')
		->groupBy('request_date')
		->all();
	$sumbu_x_data = array();
	$sumbu_y_data = array();
    foreach($datas as $data){
		//echo $data->request_date."===<br>".$data->total;
		$sumbu_x_data[] = $data->request_date;
		$sumbu_y_data[] = $data->total;
	}
	
	/*Dummy*/
	/*
	$sumbu_x_data = [1,2,3,'sss',date('Y-m-d')];
	$sumbu_y_data = [10,3,5,6,7];
	*/

?>

<div class="box box-info">
	<div class="box-header with-border">
	  <h3 class="box-title">Frekuensi Jumlah Request (Permintaan) Ambil Sampah </h3>

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		</button>
		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	  </div>
	</div>
	<!-- /.box-header -->
	<div class="box-body" style="">
<!--		Grafik 2.	Jumlah supplier yang punya basic human rights policy vs belum punya-->
<!--		<br>-->
<!--		<br>-->
<!--		Graph Dummy-->
<!--		<hr>-->
<!--		<hr>-->
		<br>
        <?=
        ChartJs::widget([
            'type' => 'bar',
            'options' => [
                'height' => '100px',
                'width' => '300px'
            ],
            'data' => [
					'labels' => $sumbu_x_data,
					'datasets' => [
						[
							'label'=> '# Jumlah Permintaan',
							'backgroundColor' => '#1C9128',
//							'borderColor' => "rgba(255,99,132,1)",
							'pointBackgroundColor' => "rgba(255,99,132,1)",
							'pointBorderColor' => "#fff",
//							'pointHoverBackgroundColor' => "#fff",
//							'pointHoverBorderColor' => "rgba(255,99,132,1)",
							'data' => $sumbu_y_data
						],
					]
				],
            'clientOptions' => [
                'legend' => [
                    'display' => true,
                    'position' => 'right',
                    'border' => true,
                    'labels' => [
                        'fontSize' => 14,
                        'fontColor' => "#425062",
                    ]
                ],
                'scales' => [
                    'yAxes' => [[
                        'ticks' => [
                            'beginAtZero' => true,
                            //'max' => 100
                        ]
                    ]
                    ]
                ]
            ],
        ]);
        ?>
<!--		X : 1,2,3,4,5-->
<!--		<br>-->
<!--		Y: 200,150,300, 400,200-->
<!--		<hr>-->
<!--		<hr>-->
	</div>
</div>