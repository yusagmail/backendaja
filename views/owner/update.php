<?php

/* @var $this yii\web\View */
/* @var $model backend\models\Owner */

use backend\models\AppVocabularySearch;

$baseName = AppVocabularySearch::getValueByKey('Owner');
$this->title = $baseName;
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_owner]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="owner-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
