<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SensorLabelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sensor Label';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body sensor-label-index">

        
        <p>
            <?= Html::a('Add Sensor Label & Limit', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'id_sensor_type',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->sensorType)) {
                            return $data->sensorType->sensor_type;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori2', $dataListMaterialKategori2, ['class' => 'form-control']),
                ],
                'type_channel',
                'channel_number',
                
                'channel_name',
                'batas_bawah',
                //'is_warning_batas_bawah',
                //'color_batas_bawah',
                'batas_atas',
                'satuan',
                //'is_warning_batas_atas',
                //'color_batas_atas',
                //'color_normal',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
