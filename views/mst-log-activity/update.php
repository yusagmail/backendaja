<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstLogActivity */

$this->title = CommonActionLabelEnum::UPDATE.' '. AppVocabularySearch::getValueByKey(' Mst Log Activity');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Mst Log Activity'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::DETAIL.' '. AppVocabularySearch::getValueByKey(' Mst Log Activity'), 'url' => ['view', 'id' => $model->id_mst_log_activity]];
$this->params['breadcrumbs'][] = CommonActionLabelEnum::UPDATE;
?>
<div class="mst-log-activity-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
