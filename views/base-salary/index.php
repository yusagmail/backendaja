<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BaseSalarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Base Salary';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body base-salary-index">

        
        <p>
            <?= Html::a('Tambah Base Salary', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
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
                'rate_lembur',
                'rate_kehadiran',
                //'property1',
                //'property2',
                //'property3',
                //'property4',
                //'property5',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
