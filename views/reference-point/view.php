<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ReferencePoint */

//$this->title = $model->name;
$this->title = 'Detail '.'Reference Point';
$this->params['breadcrumbs'][] = ['label' => 'Reference Point', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body reference-point-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_reference_point], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_reference_point], [
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
                'name',
            'display_name',
            'latitude',
            'longitude',
            ],
        ]) ?>

    </div>
</div>
