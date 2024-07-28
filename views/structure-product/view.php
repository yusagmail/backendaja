<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\StructureProduct */

//$this->title = $model->id_structure_product;
$this->title = 'Detail '.'Structure Product';
$this->params['breadcrumbs'][] = ['label' => 'Structure Product', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body structure-product-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_structure_product], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_structure_product], [
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
                'level',
            'duration',
            'remarks',
            ],
        ]) ?>

    </div>
</div>
