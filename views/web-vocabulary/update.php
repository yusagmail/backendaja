<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\WebVocabulary */

$this->title = 'Update Web Vocabulary';
$this->params['breadcrumbs'][] = ['label' => 'Web Vocabulary', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail Web Vocabulary', 'url' => ['view', 'id' => $model->id_web_vocabulary]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-vocabulary-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
