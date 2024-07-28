<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\VillagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Villages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body villages-index">

        
        <p>
            <?= Html::a('Tambah Villages', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
            'district_id',
            'name',
            'address',
            'description:ntext',
            //'goals:ntext',
            //'image:ntext',
            //'created_at',
            //'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
