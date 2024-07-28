<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAssetItem2 */

$this->title = CommonActionLabelEnum::UPDATE." ". AppVocabularySearch::getValueByKey('Type Asset Item 2');
//$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST.' Type Asset Item 2', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::DETAIL.' Type Asset Item 2', 'url' => ['view', 'id' => $model->id_type_asset_item]];
$this->params['breadcrumbs'][] = CommonActionLabelEnum::UPDATE;
?>
<div class="type-asset-item2-update">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
