<?php

/* @var $this yii\web\View */
/* @var $model backend\models\Owner */

use backend\models\AppVocabularySearch;

$baseName = AppVocabularySearch::getValueByKey('Owner');
$this->title = $baseName;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="owner-create ">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
