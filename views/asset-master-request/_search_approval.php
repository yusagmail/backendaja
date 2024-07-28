<?php

use backend\models\AssetMaster;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterRequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }

    .form-group {
        margin-bottom: 0px;
    }

    .ui-autocomplete {
        max-height: 170px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
        /* add padding to account for vertical scrollbar */
        padding-right: 10px;

    }

    #ui-id-1::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #ui-id-1::-webkit-scrollbar {
        width: 12px;
        background-color: #F5F5F5;
    }

    #ui-id-1::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #555;
    }
</style>
<div class="asset-master-request-search">

    <?php
    $form = \yii\bootstrap\ActiveForm::begin([
        'layout' => 'horizontal',
        'action' => ['approval'],
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

    <!--    --><?php //$form->field($model, 'id_asset_master_request') ?>
    <br>
    <?php $dataAssetMaster = ArrayHelper::map(AssetMaster::find()->asArray()->all(), 'id_asset_master', 'asset_name');
    echo $form->field($model, 'id_asset_master')->widget(Select2::classname(), [
        'data' => $dataAssetMaster,
        'options' => ['placeholder' => 'Pilih Asset'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Nama Asset');  ?>

    <?= $form->field($model, 'request_date')->widget(
        \dosamigos\datepicker\DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        'id' => 'assetmasterrequestsearch-request_date',
        // modify template for custom rendering
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'defaultDate' => date('Y-mm-dd'),

        ]
    ]); ?>

    <!--    --><?php //$form->field($model, 'request_datetime') ?>

    <!--    --><?php //$form->field($model, 'request_notes') ?>

    <?php // echo $form->field($model, 'requested_by') ?>

    <?php // echo $form->field($model, 'requested_user_id') ?>

    <?php // echo $form->field($model, 'requested_ip_address') ?>

    <div class="box-footer clearfix">
        <div class="form-group" style="margin-left: 1px">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <?php \yii\bootstrap\ActiveForm::end(); ?>

</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        var today = new Date();
        var dd = today.getDate();

        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }
        today = yyyy + '-' + mm + '-' + dd;
        $("#assetmasterrequestsearch-request_date").datepicker({dateFormat: 'Y-mm-dd'}).val(today);
    });
</script>
