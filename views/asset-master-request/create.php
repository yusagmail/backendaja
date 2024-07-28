<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterRequest */

$this->title = CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey(' Pengajuan Asset');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Asset Master Request'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-master-request-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
