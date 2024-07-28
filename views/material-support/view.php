<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialSupport */

//$this->title = $model->id_material_support;
$this->title = 'Detail '.'Material Support';
$this->params['breadcrumbs'][] = ['label' => 'Material Support', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body material-support-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_material_support], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_material_support], [
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
                'kode',
            'nama',
            'deskripsi',
            ],
        ]) ?>

    </div>
</div>
