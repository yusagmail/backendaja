<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Regional */

$this->title = $model->id_regional;
$this->params['breadcrumbs'][] = ['label' => 'Regionals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regional-view box box-primary">
    <div class="box-header">
        <?= Html::a('Update', ['update', 'id_regional' => $model->id_regional], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id_regional' => $model->id_regional], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id_regional',
                'treg',
                //'id_witel',
                'nama_witel',
                'datel',
            ],
        ]) ?>
    </div>
</div>
