<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MstStatusCondition */

$this->title = 'Detail Status Condition';
$this->params['breadcrumbs'][] = ['label' => 'Mst Status Conditions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mst-status-condition-view box box-primary">
    <div class="box-header with-border">
        <p>
            <?= Html::a('<< Back', ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a('Update', ['update', 'id' => $model->id_mst_status_condition], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_mst_status_condition], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <p>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id_mst_status_condition',
            'condition',
            'notes',
        ],
    ]) ?>

</div>
