<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BasicPackingItem */

$this->title = $model->id_basic_packing_item;
$this->params['breadcrumbs'][] = ['label' => 'Basic Packing Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="basic-packing-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_basic_packing_item], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_basic_packing_item], [
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
            'id_basic_packing_item',
            'id_basic_packing',
            'id_material_support',
            'jumlah',
            'keterangan',
            'created_id_user',
            'created_date',
            'created_ip_address',
        ],
    ]) ?>

</div>
