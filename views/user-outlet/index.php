<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pengguna di Outlet';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Tambah Pengguna', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//                'id',
                'full_name',
                'username',
                'email:email',
//                'password_hash',
                // 'auth_key',
				// 'user_level',
                 [
                    'attribute' => 'user_level',
                    'filter'=>false,
                ],
				/*
                [
                    'label' => 'Role',
                    'value' => 'nameOfRole',
                ],
				*/
                [
                    'label' => 'Status',
                    'value' => 'nameOfStatus',
                ],
                [   
                    'label' => 'Outlet Penjualan',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->outletPenjualanInduk)) {
                            return $data->outletPenjualanInduk->nama_outlet;
                        } else {
                            return "--";
                        }
                    },

                ],
                // 'password_reset_token',
                
//                'role',

                // 'created_at',
                // 'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
