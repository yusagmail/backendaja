<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset2 */

$this->title = CommonActionLabelEnum::UPDATE.' '. AppVocabularySearch::getValueByKey('Type Asset 2');
//$this->params['breadcrumbs'][] = ['label' => 'Type Asset 2', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => 'Detail Type Asset 2', 'url' => ['view', 'id' => $model->id_type_asset]];
$this->params['breadcrumbs'][] = CommonActionLabelEnum::UPDATE;
?>
<div class="type-asset2-update">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
