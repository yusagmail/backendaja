<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialKategori2 */

$this->title = 'Tambah Material Kategori2';
$this->params['breadcrumbs'][] = ['label' => 'Material Kategori2', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body material-kategori2-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	    <?php
	    	$request = Yii::$app->request;
	    	if ($request->isAjax) {
	    		echo common\helpers\CommonMessageHelper::ajaxInputMessageOnSave();
	    	}
	    ?>
	</div>
</div>
