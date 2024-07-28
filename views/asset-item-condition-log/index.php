<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemConditionLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asset Item Condition Log';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body asset-item-condition-log-index">

        
        <p>
            <?= Html::a('Tambah Asset Item Condition Log', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'condition_log_date',
            'condition_log_datetime',
            'condition_log_notes:ntext',
            'reported_by',
            'reported_user_id',
            //'reported_ip_address',
            //'photo1',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
