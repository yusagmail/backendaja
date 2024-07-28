<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem */

$this->title = CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Buat Qrcode');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey(' Asset Item'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-item-create">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
