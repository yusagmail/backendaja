<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAssetItem3 */

$this->title = CommonActionLabelEnum::UPDATE." ". AppVocabularySearch::getValueByKey('Type Asset Item 3');
//$this->params['breadcrumbs'][] = ['label' => 'Type Asset Item3s', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_type_asset_item, 'url' => ['view', 'id' => $model->id_type_asset_item]];
$this->params['breadcrumbs'][] = CommonActionLabelEnum::UPDATE;
?>
<div class="type-asset-item3-update">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
