<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Material */

//$this->title = $model->id_material;
$this->title = 'Detail '.'Material';
$this->params['breadcrumbs'][] = ['label' => 'Material', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body material-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_material], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_material], [
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
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
