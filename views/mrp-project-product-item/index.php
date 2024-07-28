<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MrpProjectProductItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mrp Project Product Item';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body mrp-project-product-item-index">

        
        <p>
            <?= Html::a('Tambah Mrp Project Product Item', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'plan_start_date',
            'plan_end_date',
            'actual_start_date',
            'actual_end_date',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
