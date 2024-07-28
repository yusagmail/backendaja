<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmMstJenisAbsensi */

$this->title = 'Tambah Hrm Mst Jenis Absensi';
$this->params['breadcrumbs'][] = ['label' => 'Hrm Mst Jenis Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body hrm-mst-jenis-absensi-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
