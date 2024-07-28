<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BasePendapatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Base Pendapatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body base-pendapatan-index">

        
        <p>
            <?= Html::a('Tambah Base Pendapatan', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'type_pendapatan',
            'base',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
