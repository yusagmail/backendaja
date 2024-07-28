<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JurnalTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jurnal Type';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body jurnal-type-index">

        
        <p>
            <?= Html::a('Tambah Jurnal Type', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'type_jurnal',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
