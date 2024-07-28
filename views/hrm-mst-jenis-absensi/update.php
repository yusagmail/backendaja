<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmMstJenisAbsensi */

$this->title = 'Update Hrm Mst Jenis Absensi';
$this->params['breadcrumbs'][] = ['label' => 'Hrm Mst Jenis Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mst_jenis_absensi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body hrm-mst-jenis-absensi-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
