<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\WebVocabulary */

$this->title = 'Create Web Vocabulary';
$this->params['breadcrumbs'][] = ['label' => 'Web Vocabularies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-vocabulary-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
