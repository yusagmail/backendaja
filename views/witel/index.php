<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WitelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Witels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="witel-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Create Witel', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id_witel',
                'nama_witel',
                'datel',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
