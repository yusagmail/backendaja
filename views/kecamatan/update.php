<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\Kecamatan */

$this->title = CommonActionLabelEnum::UPDATE.' '. AppVocabularySearch::getValueByKey(' Kecamatan');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Kecamatan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::DETAIL.' '. AppVocabularySearch::getValueByKey(' Kecamatan'), 'url' => ['view', 'id' => $model->id_kecamatan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kecamatan-update">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
