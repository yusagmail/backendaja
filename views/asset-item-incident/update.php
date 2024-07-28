<?php

use common\labeling\CommonActionLabelEnum;
use common\utils\EncryptionDB;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemIncident */

$this->title = CommonActionLabelEnum::UPDATE . ' ' . AppVocabularySearch::getValueByKey('  Asset Item Incident');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL . ' ' . AppVocabularySearch::getValueByKey('  Asset Item Incident'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::DETAIL . ' ' . AppVocabularySearch::getValueByKey('  Asset Item Incident'), 'url' => ['view', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_item_incident)]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box box-header box box-primary asset-item-incident-update">
    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
