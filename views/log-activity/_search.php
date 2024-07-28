<?php

use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use backend\models\User;
use backend\models\MstLogActivity;

/* @var $this yii\web\View */
/* @var $model backend\models\LogActivitySearch */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: " *";
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
<div class="log-activity-search">
    <div class="box-body">
        <?php
        $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'action' => ['index'],
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
        <?= $form->field($model, 'log_date')->widget(
            DatePicker::className(), [
            'name' => 'log_date',
//          'model' => $model,
//            'value' => '2019-12-09',
            'id' => 'datepicker',
            'inline' => false,
            'template' => '{addon}{input}',
            'options' => ['class' => 'form-control', 'autocomplete' => 'off'],
            'clientOptions' => [
                'autoclose' => true,
                'showOn' => 'button',
                'orientation' => 'bottom',
                'format' => 'yyyy-mm-dd'

            ],
        ]);?>

        <?php
        /*
         <?= $form->field($model, 'log_datetime') ?>

         */
        ?>


        <?php $dataUser = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'full_name');
        echo $form->field($model, 'userid')->widget(Select2::classname(), [
            'data' => $dataUser,
            'options' => ['placeholder' => 'Pilih User'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label("User");
        ?>

        <?php $dataActivity = ArrayHelper::map(MstLogActivity::find()->asArray()->all(), 'id_mst_log_activity', 'activity');
        echo $form->field($model, 'id_mst_log_activity')->widget(Select2::classname(), [
            'data' => $dataActivity,
            'options' => ['placeholder' => 'Pilih Activity '],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label("Activity");
        ?>

        <?php  //echo $form->field($model, 'id_mst_log_activity') ?>

        <?php // echo $form->field($model, 'userid') ?>

        <?php // echo $form->field($model, 'ip_address_user') ?>

        <?php // echo $form->field($model, 'additional_info1') ?>

        <?php // echo $form->field($model, 'additional_info2') ?>

        <?php // echo $form->field($model, 'additional_info3') ?>

        <div class="box-footer clearfix">
            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
