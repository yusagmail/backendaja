<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TypeAsset5Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Type Asset 5';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body type-asset5-index">

        
        <p>
            <?= Html::a('Tambah Type Asset 5', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'type_asset',
            'description:ntext',
            'is_active',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
