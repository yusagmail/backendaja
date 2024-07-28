<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MrpProjectProductItem */

//$this->title = $model->id_mrp_project_product_item;
$this->title = 'Detail '.'Mrp Project Product Item';
$this->params['breadcrumbs'][] = ['label' => 'Mrp Project Product Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body mrp-project-product-item-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_mrp_project_product_item], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_mrp_project_product_item], [
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
                'plan_start_date',
            'plan_end_date',
            'actual_start_date',
            'actual_end_date',
            ],
        ]) ?>

    </div>
</div>
