<?php

use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\Kecamatan */

$this->title = CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey(' Kecamatan');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Kecamatan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kecamatan-create">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
