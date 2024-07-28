<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmMstJenisAbsensi */

//$this->title = $model->id_mst_jenis_absensi;
$this->title = 'Detail '.'Hrm Mst Jenis Absensi';
$this->params['breadcrumbs'][] = ['label' => 'Hrm Mst Jenis Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body hrm-mst-jenis-absensi-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_mst_jenis_absensi], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_mst_jenis_absensi], [
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
                'jenis_absensi',
            'is_aktif',
            ],
        ]) ?>

    </div>
</div>
