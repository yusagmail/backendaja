<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\Kelurahan */

$this->title = CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey(' Kelurahan');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey(' Kelurahan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelurahan-create">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
