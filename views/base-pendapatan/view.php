<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BasePendapatan */

//$this->title = $model->id_base_pendapatan;
$this->title = 'Detail '.'Base Pendapatan';
$this->params['breadcrumbs'][] = ['label' => 'Base Pendapatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body base-pendapatan-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_base_pendapatan], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_base_pendapatan], [
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
                'type_pendapatan',
            'base',
            ],
        ]) ?>

    </div>
</div>
