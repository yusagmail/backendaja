<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\IntFilePlrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Picking List Registration (PLR)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body int-file-plr-index">

        
        <p>
            <?= Html::a('Upload File', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nama_file',
                 'created_date',
                //'created_user_id',
                //'created_ip_address',
                 /*
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{mutasi}',
                    'header' => 'Aksi',
                    'buttons' => [
                        'mutasi' => function ($url, $model) {
                            return Html::a(
                                '<div class="btn-info btn-sm"> Generate</div>',
                                $url
                            );
                        },
                    ],
                ],
                */
                [
                    'label' => 'Generate',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data){
                            $i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_int_file_plr);
                            return Html::a(
                                '<i class="fa fa-fw fa-plus"></i> Generate',
                                ['int-file-plr/generate-data', 'i' => $i],
                                ['class' => 'btn btn-warning btn-xs various fancybox.ajax']
                            );
                    }
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
