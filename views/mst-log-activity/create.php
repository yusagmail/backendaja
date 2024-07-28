<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstLogActivity */

$this->title = CommonActionLabelEnum::CREATE ." ". AppVocabularySearch::getValueByKey(' Mst Log Activity');
$this->params['breadcrumbs'][] = ['label' =>  AppVocabularySearch::getValueByKey(' Mst Log Activity'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="mst-log-activity-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
