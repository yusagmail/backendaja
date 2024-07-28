<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\MstStatusReceived */

$this->title = CommonActionLabelEnum::UPDATE .' '. AppVocabularySearch::getValueByKey(' Status Received');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL .' '. AppVocabularySearch::getValueByKey(' Mst Status Received'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::DETAIL .' '. AppVocabularySearch::getValueByKey(' Mst Status Received'), 'url' => ['view', 'id' => $model->id_status_received]];
$this->params['breadcrumbs'][] = CommonActionLabelEnum::UPDATE;
?>
<div class="mst-status-received-update">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
