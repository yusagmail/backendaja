<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\WebVocabulary */

$this->title = 'Detail Web Vocabulary';
$this->params['breadcrumbs'][] = ['label' => 'Web Vocabulary', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="web-vocabulary-view box box-success">
    <div class="box-header with-border">
    <p>
        <?= Html::a('<< Back', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id_web_vocabulary], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_web_vocabulary], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id_web_vocabulary',
            'vocab_lang1',
            'vocab_lang2',
        ],
    ]) ?>
    </div>
</div>
