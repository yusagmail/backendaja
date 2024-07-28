<?php

use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\MstStatus1 */


$baseName = AppVocabularySearch::getValueByKey('Ubah Mst Status4');
$this->title = $baseName;
$this->params['breadcrumbs'][] = $baseName;
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mst-status1-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
