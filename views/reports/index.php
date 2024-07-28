<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReportsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$dataListVillage = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\Villages::find()
        ->orderBy([
            'name' => SORT_ASC
            ])
        //->where(['id_parent_topnav' => 0])
        ->all(), 'id', 'name');
$dataListFenomena = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\Phenomenons::find()
        ->orderBy([
            'name' => SORT_ASC
            ])
        //->where(['id_parent_topnav' => 0])
        ->all(), 'id', 'name');
?>
<div class="box">
    <div class="box-body reports-index">

        
        <p>
            <?= Html::a('Tambah Reports', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                [
                    'attribute' => 'village_id',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->village)) {
                            return $data->village->name;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'village_id', $dataListVillage, ['class' => 'form-control']),
                ],

                //'phenomenon_id',
                [
                    'attribute' => 'phenomenon_id',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->phenomenon)) {
                            return $data->phenomenon->name;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'phenomenon_id', $dataListFenomena, ['class' => 'form-control']),
                ],
                'description:ntext',
                //'file',
                //'lat',
                //'long',
                //'referensi',
                'date',
                //'user_id',
                //'village_id',

                //'status',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if ($data->status == 1) {
                            return "Approved";
                        } else {
                            return "Dalam Proses";
                        }
                    },
                ],
                //'created_at',
                //'updated_at',
               

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
