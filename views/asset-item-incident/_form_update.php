<?php

use backend\models\AssetMaster;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemIncident */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$dataAssetMaster = ArrayHelper::map(AssetMaster::find()->asArray()->all(), 'id_asset_master', 'asset_name');
?>
<div class="asset-item-incident-form">
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'layout' => 'horizontal',
        //'action' => ['index1'],
        //'method' => 'get',
        'options' => ['encrypt' => 'multipart/form-data'],
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-8',
            ],
        ],
    ]); ?>

    <?php /* $dataAssetMaster = ArrayHelper::map(AssetMaster::find()->asArray()->all(), 'id_asset_master', 'asset_name');
    echo $form->field($model, 'id_asset_item')->dropDownList($dataAssetMaster,
        ['prompt' => '-Choose a Asset Item-'])->label('Nama Asset'); */?>

    <?= $form->field($model, 'id_asset_item')->textInput(['disabled' => true, 'value'=>$model->assetMaster->asset_name ])->label('Nama Asset') ?>


    <?= $form->field($model, 'incident_date')->textInput()->label('Tanggal Kejadian')->widget(
        \dosamigos\datepicker\DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        // modify template for custom rendering
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-m-dd',
        ]
    ]) ?>
    <!--    --><?php //$form->field($model, 'incident_datetime')->textInput() ?>

    <?= $form->field($model, 'incident_notes')->textarea(['rows' => 6])->label('Catatan Kerusakan') ?>

    <?= $form->field($model, 'reported_by')->textInput(['maxlength' => true])->label('Dilaporkan Oleh') ?>

    <!--    --><?php //$form->field($model, 'reported_user_id')->textInput() ?>

    <!--    --><?php //$form->field($model, 'reported_ip_address')->textInput(['maxlength' => true]) ?>

    <!--    --><?php //$form->field($model, 'photo1')->fileInput() ?>

    <!--    --><?php //$form->field($model, 'photo2')->textInput() ?>

    <!--    --><?php //$form->field($model, 'photo3')->textInput() ?>

    <!--    --><?php //$form->field($model, 'photo4')->textInput() ?>

    <!--    --><?php //$form->field($model, 'photo5')->textInput() ?>

    <div class="box-footer">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
    $(function(){
    });
</script>
