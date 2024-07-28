<?php

/* @var $this yii\web\View */
/* @var $model backend\models\HrmPegawai */

$this->title = 'Update Pegawai: ' . $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Data Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_lengkap, 'url' => ['view', 'id' => $model->id_pegawai]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hrm-pegawai-update">

    <?= $this->render('_form-old', [
        'model' => $model,
    ]) ?>

</div>
