
<?php 
use yii\helpers\Html;
use yii\grid\GridView;
// use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\HrmPegawai;
use backend\models\User;
use yii\bootstrap\ActiveForm;
use yii\web\BeginForm;
use yii\helpers\Url;

$this->title = 'Generate Pegawai';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="hrm-pegawai-index box box-primary">
    <div class="box-header with-border">
    	<button class="btn btn-danger btn-flat" data-toggle="collapse" data-target="#demo">Advance Search <i class="fa fa-search"></i></button>
		<div id="demo" class="hrm-pegawai-search collapse" style="margin-top: 20px;">
		 <?php
		    $form = \yii\bootstrap\ActiveForm::begin([
		        'layout' => 'horizontal',
		        //'action' => ['update-condition'],
		        'method' => 'get',
		        'fieldConfig' => [
		            'horizontalCssClasses' => [
		                'label' => 'col-sm-2',
		                'offset' => 'col-sm-offset-2',
		                'wrapper' => 'col-sm-8',
		            ],
		        ],
		    ]);
		    ?>

	    <?= $form->field($searchModel, 'NIP')->textInput(['maxlength' => 40, 'style' => 'width:50%;']) ?>

	    <?php echo $form->field($searchModel, 'nama_lengkap')->textInput(['style'=>'width:50%;']) ?>

	    <div class="box-footer clearfix" style="margin-left: 17.5%;">
			<div class="form-group">
				<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
				<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
			</div>
		</div>
		<?php \yii\bootstrap\ActiveForm::end(); ?>
		</div>
	</div>


<?php  if (Yii::$app->session->hasFlash('multiinfo')): ?>
  <div class="alert alert-success alert-dismissable">
        
	<?php	

		$arrayInformation=Yii::$app->session->getFlash('multiinfo');
		
		$information	= '<div class="alert in alert-block fade alert-success"><a href="#" class="close" data-dismiss="alert" style="margin-right:20px;">X</a>';
		$information    .=  '<b>Pembuatan Data User Id dan Password untuk Peserta Telah dilakukan. </b><br>'	;
		
		
		$arrayRight=$arrayInformation['right'];
		$no_right=0;
		$information  .= 'Jumlah Data User Id dan Password untuk Peserta yang Berhasil dibuat <b>'.count($arrayRight).'</b><br>'	;
		if(count($arrayRight)>0){
			$information .=	'Berikut data Data nya : <br>';

				 foreach($arrayRight as $key=>$val){
					//echo $key.'<br>';
					//print_r($val);
					//echo $val['id_pegawai'].'<br>';
					$no_right++;
					$information .=	'<b>No</b> : '.$no_right.' <br>';
					$information .=	'<b>Nama Pegawai</b> : '.$val['nama_pegawai'].' <br>';
					$information .=	'<b>User Id</b> : '.$val['userid'].' <br>';
					$information .=	'<b>Password</b> : '.$val['password'].' <br>';	
					$information .='<hr>';
					
				 }
		}
		
		$information    .= '</div>';
		
		
		$arrayError=$arrayInformation['error'];
		$no_error=0;
		$information  .= '<div class="alert in alert-block fade alert-error"><a href="#" class="close" data-dismiss="alert" style="margin-right:20px;">X</a>';
		$information  .= 'Jumlah Data User Id dan Password untuk Peserta yang Gagal dibuat <b>'.count($arrayError).'</b><br>'	;
		if(count($arrayError)>0){
			$information .=	'Berikut data Data nya : <br>';

				 foreach($arrayError as $key=>$val){
					//echo $key.'<br>';
					//print_r($val);
					//echo $val['id_pegawai'].'<br>';
					$no_error++;
					$information .=	'<b>No</b> : '.$no_error.' <br>';
					$information .=	'<b>Nama Pegawai</b> : '.$val['nama_pegawai'].' <br>';
					$information .=	'<b>Keterangan</b> : '.$val['errorSummary'].' <br>';
					
					$url		  = Yii::$app->urlManager->createUrl('hrm-pegawai/creategenerate',array('id_pegawai'=>$val['id_pegawai']));
					$link		  ='<a href="'.$url.'" class="btn btn-primary" target="_blank" style="text-decoration:none;">Generate Username dan Password</a>';
					
					$information .=	'Silahkan Klik '.$link.' Untuk Generate secara Terpisah<br>';
					$information .='<hr>';
				 }
		}
		$information    .= '</div>';

		echo $information;
		?>
    </div>
<?php endif; ?>


<?php /* if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Saved!</h4>
         <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif;  */ ?>

 

<?php /*
	$form = \yii\bootstrap\ActiveForm::begin([
	'action' => ['hrm-pegawai/createGenerateMulti','id' => 'pilihan'],
		    ]);
 */ ?>
 
<?= Html::beginForm(['hrm-pegawai/creategeneratemulti'],'post'); ?>
<?php // Html::dropDownList('action','',[''=>'Mark selected as: ','c'=>'Confirmed','nc'=>'No Confirmed'],['class'=>'dropdown',]) ?>

	<div class="box-body">
	 <?= GridView::widget([
	        'dataProvider' => $dataProvider,
	        //'filterModel' => $searchModel,
	        'columns' => [
	        	['class' => 'yii\grid\CheckboxColumn',
	        		'checkboxOptions' => function($model, $key, $index, $widget) {

	        			if ($model->userid == "") {
					            return ['value' => $model->id_pegawai];
					        }
					        return ['style' => ['display' => 'none']]; // OR ['disabled' => true]
					    },
	        		
        		],
	         //   ['class' => 'yii\grid\SerialColumn'],

	            'NIP',
				'nama_lengkap',

	           // ['class' => 'yii\grid\ActionColumn'],
	            ['class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
	            	'header'=>'Generate Username & Password',
	            	'format'=> 'raw',
		            'value' => function ($data) {

		            	if(isset($data->userid)){
							if($data->userid==''){
								$action='creategenerate';
								$linkName='Generate User ID Dan Password';
								$desk='';
								$class="btn btn-success";
							}else{
								$action='updategenerate';
								$linkName='Ubah Password';
								$desk= '<b>'.'USERID : '.$data->userid.'</b>'.'<br>';
								$class="btn btn-danger";
							}
							return $desk.Html::a($linkName, [$action,"id_pegawai"=>$data->id_pegawai], ["class"=>$class,"title"=>$linkName]);
						}else{
							return "-";
						}

	        
	            },
        	],

	        ],
	    ]); ?>
	</div>
</div>



<div style="margin:0px; padding-left: 10px; padding-top:0px;">
<img src="../../web/images/arrow_ltr.png"> Select Multiple Peserta
</div>

<div style="margin-top:10px; padding:5px 5px;">
<?= Html::submitButton('Generate Username Dan Password',['class'=>'btn btn-primary']); ?>
<?= Html::endForm() ?> 
<?php // \yii\bootstrap\ActiveForm::end(); ?>
</div>



