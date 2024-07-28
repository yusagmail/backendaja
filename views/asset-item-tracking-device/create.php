<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemTrackingDevice */

$this->title = CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey(' Asset Item Tracking Device');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Asset Item Tracking Device'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-item-tracking-device-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
