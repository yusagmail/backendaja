<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmAbsensiPegawai */

$this->title = 'Tambah Hrm Absensi Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Hrm Absensi Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body hrm-absensi-pegawai-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
