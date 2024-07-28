<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset3 */

$this->title = CommonActionLabelEnum::UPDATE.' '. AppVocabularySearch::getValueByKey('Type Asset 3');
//$this->params['breadcrumbs'][] = ['label' => 'Type Asset 3', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => 'Detail Type Asset 3', 'url' => ['view', 'id' => $model->id_type_asset]];
$this->params['breadcrumbs'][] = CommonActionLabelEnum::UPDATE;
?>
<div class="type-asset3-update">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
