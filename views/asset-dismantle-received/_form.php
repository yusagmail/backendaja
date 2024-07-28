<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model backend\models\AssetDismantleReceived */
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

<div class="asset-dismantle-received-form">
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

    <?= $form->field($model, 'id_asset_dismantle_order')->textInput() ?>

    <?php //= $form->field($model, 'id_warehouse')->textInput() ?>

    <?php $dataListWarehouse = yii\helpers\ArrayHelper::map(backend\models\Warehouse::find()->asArray()->all(), 'id_warehouse', 'nama_warehouse');
	echo $form->field($model, 'id_warehouse')->dropDownList($dataListWarehouse,
		['prompt' => '-Pilih-']); 
	?>

    <?= $form->field($model, 'received_date')->widget(datepicker::className(),[
                            'model' => $model,
                            'attribute' => 'date',
                            'template' => '{addon}{input}',
                            //'options'=>['readonly'=>'readonly'],
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                                'endDate' =>date('Y-m-d'),
                            ]
                        ]);?>

    <?= $form->field($model, 'notes')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'is_approved')->textInput() ?>

    <?= $form->field($model, 'is_approved')->dropDownList(
        ['0' => 'Belom', '1' => 'Diterima', '2' => 'Ditolak'],['prompt'=>'--PIlih--']
    ) ?>

    <?= $form->field($model, 'approval_user_id')->textInput() ?>

    <?= $form->field($model, 'approval_date') ->widget(datepicker::className(),[
                            'model' => $model,
                            'attribute' => 'date',
                            'template' => '{addon}{input}',
                            //'options'=>['readonly'=>'readonly'],
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                                'endDate' =>date('Y-m-d'),
                            ]
                        ]);?>

    <?= $form->field($model, 'approval_ip_address')->textInput(['maxlength' => true]) ?>

    <!-- <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div> -->

    <div class="box-footer">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
