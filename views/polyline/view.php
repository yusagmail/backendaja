<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Polyline */

//$this->title = $model->name;
$this->title = 'Detail '.'Polyline';
$this->params['breadcrumbs'][] = ['label' => 'Polyline', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body polyline-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_polyline], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_polyline], [
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
            'color',
            'draw_style',
            'created_ts',
            'modified_ts',
            'deleted_ts',
            ],
        ]) ?>

    </div>
</div>
