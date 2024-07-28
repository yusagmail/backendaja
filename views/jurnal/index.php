<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JurnalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jurnal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body jurnal-index">

        
        <p>
            <?= Html::a('Tambah Jurnal', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'tanggal',
            'debit',
            'kredit',
            'keterangan',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
