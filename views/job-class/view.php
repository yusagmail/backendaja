<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\JobClass */

//$this->title = $model->id_job_class;
$this->title = 'Detail '.'Job Class';
$this->params['breadcrumbs'][] = ['label' => 'Job Class', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body job-class-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_job_class], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_job_class], [
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
                'job_class',
            'keterangan',
            ],
        ]) ?>

    </div>
</div>
