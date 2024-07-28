<?php

use common\labeling\CommonActionLabelEnum;
use common\utils\EncryptionDB;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemTrackingDeviceLog */

$this->title = CommonActionLabelEnum::UPDATE . ' ' . AppVocabularySearch::getValueByKey(' Asset Item Tracking Device Log');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL . ' ' . AppVocabularySearch::getValueByKey(' Asset Item Tracking Device Log'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::DETAIL . ' ' . AppVocabularySearch::getValueByKey(' Asset Item Tracking Device Log'), 'url' => ['view', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_item_tracking_device_log)]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asset-item-tracking-device-log-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
