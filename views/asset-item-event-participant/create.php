<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemEventParticipant */

$this->title = 'Tambah Asset Item Event Participant';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Event Participant', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body asset-item-event-participant-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
