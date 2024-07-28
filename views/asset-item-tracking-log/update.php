<?php

use common\labeling\CommonActionLabelEnum;
use common\utils\EncryptionDB;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemTrackingLog */

$this->title = CommonActionLabelEnum::UPDATE . ' ' . AppVocabularySearch::getValueByKey(' Asset Item Tracking Log');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL . ' ' . AppVocabularySearch::getValueByKey(' Asset Item Tracking Log'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::DETAIL . ' ' . AppVocabularySearch::getValueByKey(' Asset Item Tracking Log'), 'url' => ['view', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_item_tracking_log)]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asset-item-tracking-log-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
