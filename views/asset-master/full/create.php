<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMaster */

$this->title = CommonActionLabelEnum::CREATE ." ". AppVocabularySearch::getValueByKey('Kategori Aset');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey(' Asset Master'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-master-create">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
