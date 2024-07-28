<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmAbsensiPegawai */

//$this->title = $model->id_hrm_absensi_pegawai;
$this->title = 'Detail '.'Hrm Absensi Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Hrm Absensi Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body hrm-absensi-pegawai-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_hrm_absensi_pegawai], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_hrm_absensi_pegawai], [
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
                'tanggal_absen',
            'waktu_login',
            'waktu_logout',
            'izin_antara_logout',
            'izin_antara_login',
            'total_menit_kerja',
            'created_date',
            'created_ip_address',
            'modified_date',
            'modified_ip_address',
            ],
        ]) ?>

    </div>
</div>
