<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JobClassSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Class';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body job-class-index">

        
        <p>
            <?= Html::a('Tambah Job Class', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'job_class',
            'keterangan',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
