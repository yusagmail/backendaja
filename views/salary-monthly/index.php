<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SalaryMonthlySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salary Monthly';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body salary-monthly-index">

        
        <p>
            <?= Html::a('Tambah Salary Monthly', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'bulan',
                'tahun',
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
                    'filter'=>false
                ],
                'gaji_pokok',
                'tunjangan1',
                'tunjangan2',
                //'tunjangan3',
                //'tunjangan4',
                //'tunjangan5',
                'jml_lembur',
                'jml_kehadiran',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
