<?php

/* @var $this yii\web\View */
/* @var $model backend\models\Location */

use backend\models\AppVocabularySearch;

$baseName = AppVocabularySearch::getValueByKey('Ubah Location');
$this->title = $baseName;
$this->params['breadcrumbs'][] = $baseName;
$this->params['breadcrumbs'][] = 'Update';

 ?>
<div class="location-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
