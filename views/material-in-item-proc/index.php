<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialInItemProcSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Material In Item Proc';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body material-in-item-proc-index">

        
        <p>
            <?= Html::a('Tambah Material In Item Proc', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'yard_awal',
            'yard_hasil1',
            'yard_hasil2',
            'yard_hasil3',
            'yard_hasil4',
            //'yard_hasil5',
            //'yard_hasil6',
            //'yard_hasil_total',
            //'buang1',
            //'buang2',
            //'is_packing',
            //'created_date',
            //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
