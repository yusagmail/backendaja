
<?php
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\HrmPegawai;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmPegawai */

$this->title = 'Update Userid & Password: ' . $modelPegawai->nama_lengkap;
$this->params['breadcrumbs'][] = 'Update';
?>


<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Saved!</h4>
         <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>


<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Saved!</h4>
         <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>


<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>

<div class="hrm-pegawai-form box box-primary">
    <?php $form = ActiveForm::begin([
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
		<?= $form->field($model,'password')->passwordInput(['maxlength' => true,'style'=>'width:50%;','value'=>'']) ?>
	   <?php /* <?= $form->field($model, 'repeatpassword')->passwordInput(['maxlength' => true]) */ ?>
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
