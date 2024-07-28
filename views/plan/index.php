<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body plan-index">

        
        <p>
            <?= Html::a('Tambah Plan', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name_plan',
            'description:ntext',
            [
                'attribute' => 'Bulan',
                'format' => 'raw',
                'value' => function ($data) {
                    if (isset($data->defecta)) {
                        return $data->defecta->month;
                    } else {
                        return "--";
                    }
                },
                //'filter'=>Html::activeDropDownList($searchModel, 'id_gudang', $dataListMaterialKategori1, ['class' => 'form-control']),
            ],
            [
                'attribute' => 'Tahun',
                'format' => 'raw',
                'value' => function ($data) {
                    if (isset($data->defecta)) {
                        return $data->defecta->year;
                    } else {
                        return "--";
                    }
                },
                //'filter'=>Html::activeDropDownList($searchModel, 'id_gudang', $dataListMaterialKategori1, ['class' => 'form-control']),
            ],
            [
                'attribute' => 'Tanggal Permintaan',
                'format' => 'raw',
                'value' => function ($data) {
                    if (isset($data->defecta)) {
                        return $data->defecta->request_date;
                    } else {
                        return "--";
                    }
                },
                //'filter'=>Html::activeDropDownList($searchModel, 'id_gudang', $dataListMaterialKategori1, ['class' => 'form-control']),
            ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
