<?php

use common\labeling\CommonActionLabelEnum;
use common\utils\EncryptionDB;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemTrackingDevice */

$this->title = CommonActionLabelEnum::DETAIL . ' ' . AppVocabularySearch::getValueByKey(' Asset Item Tracking Device');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL . ' ' . AppVocabularySearch::getValueByKey(' Asset Item Tracking Device'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asset-item-tracking-device-view box box-success">

    <div class="box-header with-border">
        <p>
            <?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a(CommonActionLabelEnum::UPDATE, ['update', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_item_tracking_device)], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(CommonActionLabelEnum::DELETE, ['delete', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_item_tracking_device)], [
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
                'id_device',
                'installed_date',
                'installed_by',
                'status_active',
                'notes',
            ],
        ]) ?>
    </div>
</div>
