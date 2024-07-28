<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\Kelurahan */

$this->title = CommonActionLabelEnum::UPDATE.' '. AppVocabularySearch::getValueByKey(' Kelurahan');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Kelurahan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::DETAIL.' '. AppVocabularySearch::getValueByKey(' Kelurahan'), 'url' => ['view', 'id' => $model->id_kelurahan]];
$this->params['breadcrumbs'][] = CommonActionLabelEnum::UPDATE;
?>
<div class="kelurahan-update">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
