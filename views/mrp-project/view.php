<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MrpProject */

//$this->title = $model->id_mrp_project;
$this->title = 'Detail '.'Project';
$this->params['breadcrumbs'][] = ['label' => 'Project', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body mrp-project-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_mrp_project], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_mrp_project], [
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

                'project_name',
                [
                    'attribute' => 'id_customer',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->customer)) {
                            return $data->customer->nama_customer;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori1', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
                'remark:ntext',
                //'is_internal_order',
                [
                    'attribute' => 'is_internal_order',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return $data->getStatusInternalOrder();
                    },

                ],
                //'is_main_order',
                [
                    'attribute' => 'is_main_order',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return $data->getStatusMainOrder();
                    },

                ],
                'plan_start_date',
                'plan_end_date',
                //'actual_start_date',
                //'actual_end_date',
            ],
        ]) ?>

    </div>
</div>
