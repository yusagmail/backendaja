<?php

use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\LocationUnit */

$baseName = AppVocabularySearch::getValueByKey('Tambah Survey');
$this->title = $baseName;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-unit-create">


    <?= $this->render('_form_location_unit', [
        'model' => $model,
    ]) ?>

</div>
