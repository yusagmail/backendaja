<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetDismantleReceivedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asset Dismantle Received';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body asset-dismantle-received-index">

        
        <p>
            <?= Html::a('Tambah Asset Dismantle Received', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'received_date',
            'notes',
            'is_approved',
            'approval_user_id',
            'approval_date',
            //'approval_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
