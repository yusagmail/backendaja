<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SupervisorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teknisi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supervisor-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Create Teknisi', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id_supervisor',
                // 'nama',
                'nama_lengkap',
                // 'NIK',
                'nomor_telepon',
                'jabatan',
                // 'id_regional',
                // 'id_witel',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
