<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Witel */

$this->title = $model->id_witel;
$this->params['breadcrumbs'][] = ['label' => 'Witels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="witel-view box box-primary">
    <div class="box-header">
        <?= Html::a('Update', ['update', 'id_witel' => $model->id_witel], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id_witel' => $model->id_witel], [
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
                'id_witel',
                'nama_witel',
                'datel',
            ],
        ]) ?>
    </div>
</div>
