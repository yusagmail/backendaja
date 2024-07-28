<?php

use common\labeling\CommonActionLabelEnum;
use common\utils\EncryptionDB;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterRequest */

$this->title = CommonActionLabelEnum::UPDATE . ' ' . AppVocabularySearch::getValueByKey(' Pengajuan Asset');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL . ' ' . AppVocabularySearch::getValueByKey(' Pengajuan Asset'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::DETAIL . ' ' . AppVocabularySearch::getValueByKey(' Pengajuan Asset'), 'url' => ['view', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_master_request)]];
$this->params['breadcrumbs'][] = CommonActionLabelEnum::UPDATE;
?>
<div class="asset-master-request-update">

    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
