<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DefectaDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Defecta Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body defecta-details-index">

        
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'id_asset_master',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->assetMaster)) {
                            return $data->assetMaster->asset_name;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_gudang', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
            'satuan',
            'sisa',
            'pemakaian_sebulan',
            'kebutuhan',
            'keterangan',
            //'created_at',
            //'updated_at',

                ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}',
                'controller'=>'defecta-details'
            ],
            ],
        ]); ?>
    
    
    </div>
</div>
