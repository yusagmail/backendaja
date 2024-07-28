<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Material */

$this->title = 'Tambah Data Material';
$this->params['breadcrumbs'][] = ['label' => 'Material', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body material-create">
		<?php
		//echo Yii::$app->request->referrer;
		/*
		$session = Yii::$app->session;
		$main_requestor = $session['main-requestor'];
		echo $main_requestor;
		*/
		?>
		
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
