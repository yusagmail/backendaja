<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WebVocabularySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Vocabulary';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-vocabulary-index box box-success">

    <div class="box-header with-border">
    <p>
        <?= Html::a('Create Web Vocabulary', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_web_vocabulary',
            'vocab_lang1',
            'vocab_lang2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>

</div>
