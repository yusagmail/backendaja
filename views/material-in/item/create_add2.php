<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialInItemProc */

$this->title = 'Tambah Material In Item Proc';
$this->params['breadcrumbs'][] = ['label' => 'Material In Item Proc', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body material-in-item-proc-create">

		<?php //= $this->render('_form_add2', [  ?>
	    <?= $this->render('_form_addh10', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
