<?php

use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\LocationUnit */

$baseName = AppVocabularySearch::getValueByKey('Location Unit');
$this->title = $baseName;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-unit-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
