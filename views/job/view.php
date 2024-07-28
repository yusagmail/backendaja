<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Job */

//$this->title = $model->id_job;
$this->title = 'Detail '.'Job';
$this->params['breadcrumbs'][] = ['label' => 'Job', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body job-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_job], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_job], [
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
                'nama_job',
            'remarks',
            ],
        ]) ?>

    </div>
</div>
