<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialFinish */

$this->title = 'Hapus Barang Jadi';
$this->params['breadcrumbs'][] = ['label' => 'Barang Jadi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body material-finish-create">

		<?= $this->render('delete/_form_delete', [
	        'model' => $modeldelete,
	    ]) ?>
		
	    <?= $this->render('_detail', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
