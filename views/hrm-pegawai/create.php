<?php


/* @var $this yii\web\View */
/* @var $model backend\models\HrmPegawai */

$this->title = 'Tambah Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Data Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-pegawai-create">

    <?= $this->render('_form-old', [
    'model' => $model,
    ]) ?>

</div>
