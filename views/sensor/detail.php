<?php

use common\helpers\Timeanddate;
use backend\models\SensorLog;
use yii\helpers\Html;
use yii\widgets\DetailView;
use dosamigos\chartjs\ChartJs;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Device */
/*
$logs = SensorLog::find()
    ->where(['id_sensor' => $model->id_sensor])
    //->andWhere(['log_date'=> '2019-07-24'])
    ->orderBy('log_time DESC')
    ->all();

$sumbu_x_data = array();
$sumbu_y_data = array();
foreach($logs as $log){
    //Label Sumbu X
    $sumbu_x_data[] = Timeanddate::getTimeOnly($log->log_time);
    $sumbu_y_data[] = $log->value1;
}
*/

$this->title = $model->sensor_name;
$this->params['breadcrumbs'][] = ['label' => 'Devices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$this->registerJs(
        "$('#submit').on('click', function() {
					var nameofmil = $('#datepicker').val();
					alert(nameofmill)
//					$('#komennotif').html(\"<div class='loader'></div>\");

//					$.post(\""."\",
//					{
//						is: \""."\",
//						isa: \""."\",
//						name: nameofmil,
//						lat: latitude,
//						long: longitude,
//						status: \"ok\"
//					},
//					function(data, status){
//						$.pjax({container: '#pjax-grid-view'})
////						$('#komennotif').html(data);
//					});
				});"
)

?>

<?php
	//$urlpost = Url::toRoute(['sa-answer-certificate/receiveanswer']);
	
	//Untuk generate datanya
	//Difilter per device dan per tanggal 
	// (Sementara auntuk tanggal harcode dulu karena filternya belum dibuat)
	$logs = SensorLog::find()
			->where(['id_sensor' => $model->id_sensor])
//            ->andWhere(['>','value1','80'])
            //->andWhere(['log_date'=> '2019-07-24'])
			->orderBy('log_time DESC')
			->limit(1000)
			->all();
	$sumbu_x_data = array();
	$sumbu_y_data = array();
	
	$BATAS_BAWAH = -10;
	
	$avg = 0; $min = 999; $max = 0; $total=0; $i=0;
	foreach($logs as $log){
		$val = $log->value1*1;
		
		if($val > $BATAS_BAWAH){
			//Label Sumbu X
			$sumbu_x_data[] = Timeanddate::getTimeOnly($log->log_time);
			$sumbu_y_data[] = $log->value1;
			
			if($val > $max){
				$max = $val;
			}
			if($val < $min){
				$min = $val;
			}
			$total = $total + $val;
			$i++;
		}
	}
	if($i>0){
		$avg = round(($total/$i),2);
	}
	$spread = $max - $min;
?>

<div class="device-view box box-primary">
    <?php /*<h1><?= Html::encode($this->title) ?></h1>*/ ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_sensor',
            'sensor_name',
            //'device_id',
            //'address',
            //'param1',
        ],
    ]) ?>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Grafik Harian <?= $this->title = $model->sensor_name; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $form = ActiveForm::begin([
                            'method' => 'post',
                            'enableClientScript' => false
                        ]);
                        ?>
                        <?= '<label class="control-label">Select Date Range</label>'; ?>
                        <?= DatePicker::widget([
                            'name' => 'Test',
//                            'model' => $model,
//                            'value' => $log_date,
                            'id' => 'datepicker',
                            'template' => '{addon}{input}',
                            'options' => ['class' => 'form-control', 'autocomplete' => 'off'],
                            'clientOptions' => [
                                'autoclose' => true,
                                'showOn' => 'button',
                                'orientation' => 'bottom',
                                'format' => 'yyyy-mm-dd'

                            ],
                                                ]);?>
                        <br>
                        <?php echo Html::submitButton('TAMPILKAN') ?>
                        <?php ActiveForm::end(); ?>
                        <?php
						/*
                        echo newerton\fancybox\FancyBox::widget([
                            'target' => 'a[rel=fancybox]',
                            'helpers' => true,
                            'mouse' => true,
                            'config' => [
                                'maxWidth' => '90%',
                                'maxHeight' => '90%',
                                'playSpeed' => 7000,
                                'padding' => 0,
                                'fitToView' => false,
                                'width' => '70%',
                                'height' => '70%',
                                'autoSize' => false,
                                'closeClick' => false,
                                'openEffect' => 'elastic',
                                'closeEffect' => 'elastic',
                                'prevEffect' => 'elastic',
                                'nextEffect' => 'elastic',
                                'closeBtn' => false,
                                'openOpacity' => true,
                                'helpers' => [
                                    'title' => ['type' => 'float'],
                                    'buttons' => ['close'],
                                    'thumbs' => ['width' => 68, 'height' => 50],
                                    'overlay' => [
                                        'css' => [
                                            'background' => 'rgba(0, 0, 0, 0.8)'
                                        ]
                                    ]
                                ],
                            ]
                        ]);
                        $url = \yii\helpers\Url::toRoute(['update/', '$id'=>$model->id_sensor]);
                        echo Html::a(Html::button('Submit'), '../../web/images/hujan.jpg', ['rel' => 'fancybox']);
                        */
						?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Grafik <?= $this->title = $model->sensor_name; ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                   </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
						<?= $this->render('detail/_graph_suhu', [
								//'model' => $model,
								'sumbu_x_data' => $sumbu_x_data,
								'sumbu_y_data' => $sumbu_y_data,
						]) ?>
                    </div>
                    <div class="col-md-4">
						<?= $this->render('detail/_rekap_suhu', [
								'max' => $max,
								'min' => $min,
								'avg' => $avg,
								'spread' =>$spread
						]) ?>
                    </div>
                 </div>
                </div>

            </div>
    </div>
</div>

