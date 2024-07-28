<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialKategori3 */

$this->title = 'Tambah Material Kategori3';
$this->params['breadcrumbs'][] = ['label' => 'Material Kategori3', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body material-kategori3-create">

		
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
