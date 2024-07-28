<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use kartik\file\FileInput;
use yii\widgets\ActiveForm;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use yii\web\UploadedFile;
use backend\models\AssetItem;
use yii\bootstrap\Modal;
use yii\base\DynamicModel;
/* @var $modelImport backend\models\AssetItem */


$this->title = CommonActionLabelEnum::LIST_ALL . "" . AppVocabularySearch::getValueByKey('ImportFile');
?>

<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/extensions/js/sweetalert2/dist/sweetalert2.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>
<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/extensions/js/sweetalert2/dist/core.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>
<?php $this->registerCssFile(Yii::$app->request->baseUrl . '/extensions/js/sweetalert2/dist/sweetalert2.min.css'); ?>

<div class="box">
    <div class="box-body">
        <div class="callout callout-info">
            <p> <?php $this->title = CommonActionLabelEnum::PLEASE_CHOOSE . "" . AppVocabularySearch::getValueByKey(' Data File') ?>
                <b>File Asset (<?= date('F Y') ?>)</b>
            </p>
        </div>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'import']]); ?>

        <?= FileInput::widget(['model' => $modelImport,
            'attribute' => 'fileImport',
            'pluginOptions' => [
                'allowedFileExtensions' => ['xls', 'xlsx', 'csv'],
                'showUpload' => true,
                'maxFileSize' => 10240,
            ],

        ]);
        ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php
$this->registerJs(
    '
		$( document ).ready(function() {
			$("#import").on("afterValidate", function(){
				swal({
						  title: "Please Wait",
						  text: "saving..",
						  type: "info",
						  allowOutsideClick: false,
						  showCancelButton: false, // There wont be any cancel button
						  showConfirmButton: false, // There wont be any confirm button
						  allowEscapeKey:false,
						  onOpen: function () {
							swal.showLoading();
						  }, 

						});
			});
		});
'); ?>
