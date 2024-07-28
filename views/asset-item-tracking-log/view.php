<?php

use common\labeling\CommonActionLabelEnum;
use common\utils\EncryptionDB;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemTrackingLog */

$this->title = CommonActionLabelEnum::DETAIL . ' ' . AppVocabularySearch::getValueByKey('Asset Item Tracking Log');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL . ' ' . AppVocabularySearch::getValueByKey(' Asset Item Tracking Log'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asset-item-tracking-log-view box box-success">
    <div class="box-header with-border">

        <p>
            <?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a(CommonActionLabelEnum::UPDATE, ['update', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_item_tracking_log)], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(CommonActionLabelEnum::DELETE, ['delete', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_item_tracking_log)], [
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
                'id_asset_item',
                'id_device_tracking',
                'log_date',
                'log_datetime',
                'device_logtime',
                'longitude',
                'latitude',
                'full_message',
            ],
        ]) ?>
    </div>
</div>
