<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset5 */

$this->title = CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey('Type Asset 5');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST.' '. AppVocabularySearch::getValueByKey('Type Asset 5'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-asset5-create">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
