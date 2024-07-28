<?php
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\HrmPegawai;
use backend\models\Users;

$this->title = 'Generate Userid & Password: ' . $modelPegawai->nama_lengkap;
$this->params['breadcrumbs'][] = 'Create';
?>


<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>

	<div class="hrm-pegawai-form box box-primary">
	    <?php $form = ActiveForm::begin([
	    	'id' => 'users-form',
	    	'encodeErrorSummary' => false,
	    	'errorSummaryCssClass' => 'help-block',
	        'layout' => 'horizontal',
	        'class' => 'form-horizontal',
	        'fieldConfig' => [
	            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
	            'horizontalCssClasses' => [
	                'label' => 'col-sm-2',
	                'offset' => 'col-sm-offset-3',
	                'wrapper' => 'col-sm-10',
	                'error' => '',
	                'hint' => '',
	            ],
	        ],
	    ]); ?>

  <br>

	 <div class="box-body table-responsive">
	   <div class="col-md-12">
	    <?= Html::errorSummary($model, ['encode' => false]) ?>

		<?= $form->field($model, 'username')->textInput(['maxlength' => true,'style'=>'width:50%;','readonly'=>true])?>
		<?= $form->field($model,'password')->textInput(['maxlength' => true,'style'=>'width:50%;','readonly'=>true])?>

		  <?= $form->field($model,'full_name')->textInput(['maxlength' => true,'style'=>'width:50%;']) ?>
		  
		</div>
		 <div>
		    <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
		 </div>
	   <?php ActiveForm::end(); ?>
	 </div>

	</div>


<div class="view">

	<h4>Info Pegawai </h4>

	 <div class="box-body table-responsive no-padding">
	        <?= DetailView::widget([
	            'model' => $modelPegawai,
	            'attributes' => [
	                //'id',
	                'nama_lengkap',
	                'NIP',
	                'jenis_kelamin',
	          
	            ],
	        ]) ?>
	</div>

</div>