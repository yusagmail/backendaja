<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthRoleName */

$this->title = 'Update Auth Role Name';
$this->params['breadcrumbs'][] = ['label' => 'Auth Role Name', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_auth_role_name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body auth-role-name-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
