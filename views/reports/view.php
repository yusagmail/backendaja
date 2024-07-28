<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Reports */

//$this->title = $model->id;
$this->title = 'Detail '.'Reports';
$this->params['breadcrumbs'][] = ['label' => 'Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body reports-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
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
                    //'filter'=>Html::activeDropDownList($searchModel, 'village_id', $dataListVillage, ['class' => 'form-control']),
                ],
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
                    //'filter'=>Html::activeDropDownList($searchModel, 'phenomenon_id', $dataListFenomena, ['class' => 'form-control']),
                ],
                //'phenomenon_id',
                'referensi',
                'description:ntext',
                'file',
                'lat',
                'long',
                
                'user_id',
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
                'created_at',
                'updated_at',
                'date',
            ],
        ]) ?>

    </div>
</div>
