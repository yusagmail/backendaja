<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Vendor */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vendor-view box box-primary">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <div class="box-body">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_vendor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_vendor], [
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
            //'id_vendor',
            'name',
            'company',
            'address',
            'city',
            'state',
            'zip',
            'country',
            'email_address:email',
            'phone_number',
//            'id_type_of_vendor',
            'typeOfVendor.type_of_vendor',
            /*
            'created_date',
            'created_time',
            'created_ip_address',
            'created_id_user',
            'id_user',
            */
        ],
    ]) ?>
    </div>
</div>
