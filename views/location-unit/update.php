<?php

use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\LocationUnit */

$baseName = AppVocabularySearch::getValueByKey('Ubah  Location Unit');
$this->title = $baseName;
$this->params['breadcrumbs'][] = $baseName;
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="location-unit-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
