<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetDismantleOrder */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
?>
<style>
    div.required label.control-label:after {
        content: ' *';
        color: red;
    }
</style>

<?php
//CSS Ini digunakan untuk overide jarak antar form biar tidak terlalu jauh
?>
<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>
<div class="asset-dismantle-order-form">

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
    <?php
    if ($model->hasErrors()) {
    ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model); ?>
        </div>
    <?php
    }
    ?>
    <?php //= $form->field($model, 'id_pegawai')->textInput() ?>
    <?php $dataListJobClass = yii\helpers\ArrayHelper::map(backend\models\Customer::find()->asArray()->all(), 'id_customer', 'nama_customer');
	echo $form->field($model, 'id_customer')->dropDownList($dataListJobClass,
		['prompt' => '-Pilih-']); 
	?>
    
    <?= $form->field($model, 'alamat_customer')->textInput(['readonly' => true]);

     ?>

    <?php //= $form->field($model, 'type_order')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_order')->textInput(['readonly' => true]);
        // ['UNINSTALLATION' => 'UNINSTALLATION'],['prompt'=>'--PIlih--']
     ?>

    <?php $dataListJobClass = yii\helpers\ArrayHelper::map(backend\models\JobClass::find()->asArray()->all(), 'id_job_class', 'job_class');
	echo $form->field($model, 'id_job_class')->dropDownList($dataListJobClass,['disabled' => true]);
		// ['prompt' => '-Pilih-']); 
	?>

    <?php //= $form->field($model, 'id_job_class')->textInput() ?>

    <?= $form->field($model, 'order_date')->widget(datepicker::className(),[
                            'model' => $model,
                            'attribute' => 'date',
                            'template' => '{addon}{input}',
                            'options'=>['disabled'=>'disabled'],
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                                'endDate' =>date('Y-m-d'),
                            ]
                        ]);?>

    <?php //= $form->field($model, 'order_number')->textInput(['maxlength' => true]) ?> 

    <!-- <?= $form->field($model, 'order_increment')->textInput() ?> -->

    <?php //= $form->field($model, 'year')->textInput() ?>

    <?php $dataListAsset=\backend\models\AssetItem::getListAssetItem();
	echo $form->field($model, 'id_asset_item')->dropDownList($dataListAsset, ['disabled' => true]);
		// ['prompt' => '-Pilih-']); 
	?>

    <?php //= $form->field($model, 'id_asset_item')->textInput() ?>


    <?php //= $form->field($model, 'id_customer')->textInput() ?>

    <?= $form->field($model, 'notes')->textInput(['maxlength' => true]) ?>

    <!--  <?= $form->field($model, 'created_date')->textInput() ?> -->

    <!-- <?= $form->field($model, 'created_id_user')->textInput() ?> -->

    <!-- <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>  -->

    <?php $dataListPegawai = yii\helpers\ArrayHelper::map(backend\models\Supervisor::find()->asArray()->all(), 'id_supervisor', 'nama_lengkap');
	echo $form->field($model, 'id_supervisor')->dropDownList($dataListPegawai,
		['prompt' => '-Pilih-']); 
	?>

    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
