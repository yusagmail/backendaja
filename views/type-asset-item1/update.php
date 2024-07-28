<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
/* @var $this yii\web\View */
/* @var $model backend\models\TypeAssetItem1 */

$this->title = CommonActionLabelEnum::UPDATE." ". AppVocabularySearch::getValueByKey('Type Asset Item 1');
//$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::CREATE.' Type Asset Item 1', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::DETAIL.' Type Asset Item 1', 'url' => ['view', 'id' => $model->id_type_asset_item]];
$this->params['breadcrumbs'][] = CommonActionLabelEnum::UPDATE;
?>
<div class="type-asset-item1-update">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
