<?php

use yii\grid\GridView;
use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstStatusReceivedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CommonActionLabelEnum::LIST_ALL ." ". AppVocabularySearch::getValueByKey(' Status Received');
$this->params['breadcrumbs'][] = $this->title;
$dataActive = ['' => CommonActionLabelEnum::CHOOSE, '1' => CommonActionLabelEnum::ACTIVE, '0' => CommonActionLabelEnum::IN_ACTIVE]
?>
<div class="mst-status-received-index box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE .' '. AppVocabularySearch::getValueByKey('Mst Status Received'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="box-body table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'header' => 'No',
                    'class' => 'yii\grid\SerialColumn'

                ],

//                'id_status_received',
                'status_received',
                [
                    'attribute' => 'is_active',
                    'value' => function ($model) {
                        return $model->is_active == 0 ? CommonActionLabelEnum::IN_ACTIVE : CommonActionLabelEnum::ACTIVE;
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'is_active', $dataActive, ['class' => 'form-control']),


                ],

                [
                    'header' => 'Action',
                    'class' => 'yii\grid\ActionColumn'
                ],
            ],
        ]); ?>

    </div>
</div>
