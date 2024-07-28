<?php

use common\labeling\CommonActionLabelEnum;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstAccrualSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mst Accruals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mst-accrual-index box box-primary">

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
<div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_mst_accrual',
            'method',
            'notes:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
