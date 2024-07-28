<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\Propinsi */

$this->title = CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey(' Provinsi');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Provinsi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propinsi-create">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
