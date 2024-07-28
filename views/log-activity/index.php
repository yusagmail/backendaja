<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LogActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CommonActionLabelEnum::LIST_ALL . ' ' . AppVocabularySearch::getValueByKey(' Log Activity');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-activity-index box box-success">


    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php ?>
    <div class="box-body table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'header' => 'No',
                    'class' => 'yii\grid\SerialColumn'],

                //'id_log_activity',
                //'log_date',
                'log_datetime',
                'tablename',
                //'related_id',
                [
                    'label' => 'Activity',
                    'attribute' => 'mstActivity.activity',
                ],
//                'id_activity',
                [
                    'label' => 'User Updated',
                    'attribute' => 'user.full_name',
                ],
//            'userid',
                'ip_address_user',
                //'additional_info1:ntext',
                //'additional_info2:ntext',
                //'additional_info3:ntext',

                [
                    'header' => 'Action',
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {delete}',
                ],
            ],
        ]); ?>
    </div>
</div>
