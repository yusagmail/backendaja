<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PolylineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div id="list_point" style="margin-left: -7px;">
<div class="box">
    <div class="box-body polyline-index">
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php
    \yii\widgets\Pjax::begin(['id' => 'pjax_list_point', 'options'=> ['class'=>'pjax', 'loaderId'=>'loader_id_polylinepoint', 'neverTimeout'=>true]]);
    ?>
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
        'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                'point_seq',
                [
                    'attribute' => 'id_reference_point',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->referencePoint)) {
                            return $data->referencePoint->name;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                ],
                [
                    'label' => 'latitude',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->referencePoint)) {
                            return \common\helpers\CoordinateCalculation::decimalToDMSWithDirection($data->referencePoint->latitude, true);
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                ],
                [
                    'label' => 'longitude',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->referencePoint)) {
                            return \common\helpers\CoordinateCalculation::decimalToDMSWithDirection($data->referencePoint->longitude, false);
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                ],
    
                //['class' => 'yii\grid\ActionColumn'],
                [
                    'label' => 'Action',
                    'format' => 'raw',
                    'value' => function ($data)  {
                        return '
                            <button type="button" class="updaterow11 glyphicon glyphicon-arrow-up" data-childup="' . $data->id_polyline_point . '"></button>

                            <button type="button" class="updaterow11 glyphicon glyphicon-arrow-down" data-childdown="' . $data->id_polyline_point . '"></button>
                            
                            <button type="button" class="deleterow11 glyphicon glyphicon-trash" data-childpointid="' . $data->id_polyline_point . '"></button>
                        ';

                    },

                ],
            ],
        ]); ?>
    

        <?php
        \yii\widgets\Pjax::end();
        ?>
    </div>
</div>
</div>

