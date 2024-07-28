<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Supervisor */

$this->title = $model->id_supervisor;
$this->params['breadcrumbs'][] = ['label' => 'Teknisi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supervisor-view box box-primary">
    <div class="box-header">
        <?= Html::a('Update', ['update', 'id_supervisor' => $model->id_supervisor], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id_supervisor' => $model->id_supervisor], [
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
                'id_supervisor',
                // 'nama',
                'nama_lengkap',
                'NIK',
                'nomor_telepon',
                // 'jabatan',
                'id_regional',
                'id_witel',
            ],
        ]) ?>
    </div>
</div>
