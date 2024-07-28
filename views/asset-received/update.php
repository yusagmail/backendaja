<?php

use common\labeling\CommonActionLabelEnum;
use common\utils\EncryptionDB;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetReceived */

$this->title = CommonActionLabelEnum::UPDATE . ' ' . AppVocabularySearch::getValueByKey(' Asset Received');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL . ' ' . AppVocabularySearch::getValueByKey(' Asset Received'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::DETAIL . ' ' . AppVocabularySearch::getValueByKey(' Asset Received'), 'url' => ['view', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_received)]];
$this->params['breadcrumbs'][] = CommonActionLabelEnum::UPDATE;
?>
<div class="asset-received-update">

    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
