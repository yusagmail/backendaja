<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstStatus1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$baseName = AppVocabularySearch::getValueByKey('Mst Status1');
$this->title = $baseName;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mst-status1-index box box-success">

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE." ".$baseName, ['create'], ['class' => 'btn btn-success']) ?>

            <?php
            /*
            <?= Html::button('Import File',
                ['value' => Url::to(['/asset-item/import-file']),
                    'title' => 'Upload Data', 'class' => 'showModalButton btn btn-success']); ?>
             */
            ?>
        </p>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_mst_status',
            'mst_status',
            'description:ntext',
            'is_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
