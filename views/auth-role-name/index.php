<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthRoleNameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Auth Role Name';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body auth-role-name-index">

        
        <p>
            <?= Html::a('Tambah Auth Role Name', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'auth_item_name',
                'role_name',
                //'as_generic_choice',
                [
                    'attribute' => 'as_generic_choice',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return $data->asGenericChoice;
                    },
                ],
                [
                    'attribute' => 'is_active',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return $data->isActive;
                    },
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
