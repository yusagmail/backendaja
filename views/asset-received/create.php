<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetReceived */

$this->title = CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey(' Asset Received');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey(' Asset Received'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-received-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
