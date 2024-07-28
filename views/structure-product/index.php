<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StructureProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Structure Product';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body structure-product-index">

        
        <p>
            <?= Html::a('Tambah Structure Product', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'level',
            'duration',
            'remarks',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
