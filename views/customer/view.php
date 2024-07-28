<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */

//$this->title = $model->id_customer;
$this->title = 'Detail '.'Customer';
$this->params['breadcrumbs'][] = ['label' => 'Customer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body customer-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_customer], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_customer], [
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
            
                'nama_customer',
            'alamat',
            'alamat_lain',
            // 'id_propinsi',
            [
                'attribute' => 'id_propinsi',
                'format' => 'raw',
                'value' => function ($data) {
                    if (isset($data->Propinsi)) {
                        return $data->Propinsi->nama_propinsi;
                    } else {
                        return "--";
                    }
                },
                //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
            ],

            'telepon_rumah',
            'email:email',
            ],
        ]) ?>

    </div>
</div>
