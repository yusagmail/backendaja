<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HrmAbsensiPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hrm Absensi Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body hrm-absensi-pegawai-index">

        
        <p>
            <?= Html::a('Tambah Hrm Absensi Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id_pegawai',
                [
                    'attribute' => 'id_pegawai',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->pegawai)) {
                            return $data->pegawai->nama_lengkap;
                        } else {
                            return "--";
                        }
                    },

                ],
                [
                    'label' => 'NIP',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->pegawai)) {
                            return $data->pegawai->NIP;
                        } else {
                            return "--";
                        }
                    },

                ],
                'tanggal_absen',
                'waktu_login',
                'waktu_logout',
                //'izin_antara_logout',
                //'izin_antara_login',
                //'total_menit_kerja',
                //'created_date',
                //'created_ip_address',
                //'modified_date',
                //'modified_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
