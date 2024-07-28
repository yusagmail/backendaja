<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DefectaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Defecta';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body defecta-index">

        
        <p>
            <?= Html::a('Tambah Defecta', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'title',
                'request_date',
                //'id_gudang',
                [
                    'attribute' => 'id_gudang',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->gudang)) {
                            return $data->gudang->nama_gudang;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_gudang', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
                //'month',
                //'year',
                //'created_at',
                //'updated_at',

                    ['class' => 'yii\grid\ActionColumn',
                ],
            ],
        ]); ?>
    
    
    </div>
</div>
