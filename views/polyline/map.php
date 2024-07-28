<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PolylineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Polyline';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body polyline-index">

        
        <p>
            <?= Html::a('Add Polyline', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
            'display_name',
            'color',
            'draw_style',
            'created_ts',
            //'modified_ts',
            //'deleted_ts',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
