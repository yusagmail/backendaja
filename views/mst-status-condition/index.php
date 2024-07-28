<?php

use common\labeling\CommonActionLabelEnum;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstStatusConditionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Status Condition';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mst-status-condition-index box box-primary">
    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE, ['create'], ['class' => 'btn btn-success']) ?>

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

            'id_mst_status_condition',
            'condition',
            'notes',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
