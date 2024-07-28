<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\Kabupaten */

$this->title = CommonActionLabelEnum::UPDATE.' '. AppVocabularySearch::getValueByKey(' Kabupaten');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Kabupaten'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::DETAIL.' '. AppVocabularySearch::getValueByKey(' Kabupaten'), 'url' => ['view', 'id' => $model->id_kabupaten]];
$this->params['breadcrumbs'][] = CommonActionLabelEnum::UPDATE;
?>
<div class="kabupaten-update">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
