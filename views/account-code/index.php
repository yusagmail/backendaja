<?php

use common\labeling\CommonActionLabelEnum;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AccountCodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Account Codes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-code-index box box-primary">
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
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_account_code',
//     'id_account_code_parent',
            'accountCode.account_name',
            'account_code',
            'account_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<!--    --><?php //TreeGrid::widget([
//        'dataProvider' => $dataProvider,
//        'keyColumnName' => 'account_code',
//        'parentColumnName' => 'id_account_code_parent',
//        'parentRootValue' => '0', //first parentId value
//        'pluginOptions' => [
//            'initialState' => 'collapsed',
//        ],
//        'columns' => [
//            'account_name',
//            'account_code',
//            'id_account_code_parent',
//            ['class' => 'yii\grid\ActionColumn']
//        ]
//    ]); ?>
</div>
