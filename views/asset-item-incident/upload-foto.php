<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use backend\models\AssetItemIncident;
use backend\models\AssetMaster;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;


/* @var $this yii\web\View */
/* @var $model backend\models\Sekolah */
/* @var $form \yii\widgets\ActiveForm */

$this->title = ' Unggah Foto Kerusakan Asset';
$this->params['breadcrumbs'][] = ['label' => 'Logo Kampus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
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

<div class="content-form box box-success">
    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
    </div>

    <div class="box-header with-border">
        <?php //$form = ActiveForm::begin(); ?>
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            //'action' => ['index1'],
            //'method' => 'get',
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    'offset' => 'col-sm-offset-2',
                    'wrapper' => 'col-sm-8',
                ],
            ],
        ]); ?>

        <div class="box-header with-border">
            <?php $dataAssetMaster = ArrayHelper::map(AssetMaster::find()->asArray()->all(), 'id_asset_master', 'asset_name');
            echo $form->field($model, 'id_asset_item')->dropDownList($dataAssetMaster,
                ['prompt' => '-Choose a Asset Item-', 'disabled' => 'disabled'])->label('Nama Asset'); ?>

            <?php
            for ($i = 1; $i <= 1; $i++) {
                ?>
                <div class="box-header with-border">

                    <div class="form-group row">

                        <?php
                        $fieldname = "photo" . $i;
                        if ($model->$fieldname != "") {
                            ?>
                            <label class="control-label col-sm-2" for="assetitem-picture4">Picture
                                Eksisting<?= $i ?></label>
                            <div class="col-sm-6">
                                <?php
                                if ($model->$fieldname != "") {
                                    $label = "Re-Upload Gambar";
                                    $res = '<img src="'  . '../..' . '/web/images/asset_kejadian/' . $model->$fieldname . '" class="img-responsive" style="width:200px;"/>';
                                } else {
                                    $res = '<small class="label bg-orange">Gambar tidak ada</small><Br>';
                                    $label = "Upload Gambar";
                                }
                                $res .= '<br>';
                                echo $res;
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <?php
                    echo $form->field($model, 'photo' . $i)->widget(\kartik\file\FileInput::className(), [
                        'pluginOptions' => [
                            'showUpload' => false,
                            'browseLabel' => 'Select Photo',
                            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',

                        ],
                    ]);
                    ?>
                </div>
                <?php
            }
            ?>


        </div>

        <div class="box-footer">
            <div class="form-group">
                <?= Html::submitButton(CommonActionLabelEnum::SAVE, ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
