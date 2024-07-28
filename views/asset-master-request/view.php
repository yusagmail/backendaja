<?php

use common\labeling\CommonActionLabelEnum;
use common\utils\EncryptionDB;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterRequest */

$this->title = CommonActionLabelEnum::VIEW . "" . AppVocabularySearch::getValueByKey(' Pengajuan Asset');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL . ' ' . AppVocabularySearch::getValueByKey(' Pengajuan Asset'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asset-received-view box box-success">

    <div class="box-header with-border">
        <p>
            <?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a(CommonActionLabelEnum::UPDATE, ['update', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_master_request)], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(CommonActionLabelEnum::DELETE, ['delete', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_master_request)], [
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
//            'id_asset_master_request',
                'assetMaster.asset_name',
                'request_date',
//            'request_datetime',
                'request_notes:ntext',
                'requested_by',
//            'requested_user_id',
//            'requested_ip_address',
            ],
        ]) ?>

    </div>
