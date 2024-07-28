<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\chartjs\ChartJs;
use yii\helpers\ArrayHelper;

use backend\models\SensorLog;
use common\helpers\Timeanddate;

?>



		<div class="chart">
			<?= ChartJs::widget([
				'type' => 'line',
				'options' => [
					'height' => 300,
					'width' => 600
				],
				'data' => [
					'labels' => $sumbu_x_data,
					'datasets' => [
						[
							'label'=> '# Suhu',
//							'backgroundColor' => "rgba(106,32,204,0.2)",
//							'borderColor' => "rgba(255,99,132,1)",
							'pointBackgroundColor' => "rgba(255,99,132,1)",
							'pointBorderColor' => "#fff",
//							'pointHoverBackgroundColor' => "#fff",
//							'pointHoverBorderColor' => "rgba(255,99,132,1)",
							'data' => $sumbu_y_data
						],
					]
				]
			]);?>
		</div>
	<br>

