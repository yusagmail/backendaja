<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAssetItem1 */

$this->title = CommonActionLabelEnum::CREATE." ". AppVocabularySearch::getValueByKey('Type Asset Item 1');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::CREATE." ". AppVocabularySearch::getValueByKey('Type Asset Item 1'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-asset-item1-create box box-primary">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
