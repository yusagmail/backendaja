<?php

use common\labeling\CommonActionLabelEnum;
use common\utils\EncryptionDB;
use backend\models\AppVocabularySearch;
use backend\models\AssetItem;
use backend\models\AssetMaster;
use backend\models\MstStatusReceived;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetReceived */

$this->title = CommonActionLabelEnum::VIEW ."" . AppVocabularySearch::getValueByKey(' Asset Received');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Asset Received'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asset-received-view box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <div class="box-header with-border">
        <p>
            <?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a(CommonActionLabelEnum::UPDATE, ['update', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_received)], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(CommonActionLabelEnum::DELETE, ['delete', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_received)], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => CommonActionLabelEnum::CONFIRM_DELETE,
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
//            'id_asset_received',
                [
                    'attribute' => 'assetMaster.asset_name',
                ],
                'number1',
                'number2',
                'number3',
                'purchasing_invoice_number',
                [
                    'attribute' => 'received_date',
                    'format'=>['Date','php:d-M-Y']
                ],
                'received_year',
                'price_received',
                'quantity',
                [
                    'attribute' => 'statusReceived.status_received',
                ],
            ],
        ]) ?>

        <?php
            $items = AssetItem::find()->where(['id_asset_received' => $model->id_asset_received])->all();
        ?>

        <?php Pjax::begin(['id' => 'pjax-grid-view']); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'showPageSummary' => true,
            'pjax' => true,
            'striped' => true,
            'hover' => true,
            'responsiveWrap' => false,
            'panel' => ['type' => 'primary', 'heading' => 'Aset Item'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                [
                    'header' => 'No',
                    'class' => 'yii\grid\SerialColumn'
                ],
               'number1',
               'number2',
            ],
        ]); ?>
        <?php Pjax::end(); ?>
        

        <!-- <?php $form = ActiveForm::begin([
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
        <div class="box-body">
            <div class="col-md-4">
                <div class="form-group">
                    <b>Dari</b>
                    <?= Html::input('text','password1','', $options=['class'=>'form-control', 'maxlength'=>10, 'style'=>'width:350px']) ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <b>Sampai</b>
                    <?= Html::input('text','password1','', $options=['class'=>'form-control', 'maxlength'=>10, 'style'=>'width:350px']) ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" >
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-success','style'=>'margin-top: 18px;']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?> -->
    </div>
</div>
