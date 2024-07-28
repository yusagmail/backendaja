<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SupplierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visitor Form';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="callout callout-info">
	<p>Form-form ini dapat digunakan oleh anda pengunjung website kami untuk berbagai keperluan.<br>
		Silakan dipilih beberapa form yang sesuai dengan keperluan anda.</p>
</div>

<div class="box">
	<div class="box box-default">
		<div class="box-header with-border">
		<?php
		$url = Url::toRoute(['grievance-submission/submission']);
		?>
		  <h3 class="box-title"><a href="<?= $url ?>">Grievance Submission</a></h3>
		</div>
		<div class="box-body">
		  Form ini bisa anda gunakan untuk  mengajukan "grievance" / keluhan secara spesifik kepada perusahaan kami. 
		</div>
	</div>
	<div class="box box-default">
		<div class="box-header with-border">
		<?php
		$url = Url::toRoute(['grievance-list-request/submission']);
		?>
		  <h3 class="box-title"><a href="<?= $url ?>">Grievance List Request</a></h3>
		</div>
		<div class="box-body">
		  Form ini digunakan untuk keperluan mengajukan list/daftar grievance yang pernah dimiliki. 
		  Anda silakan mengisi form pengajuannya, kemudian akan kami proses jika syarat dan ketentuan terpenuhi.
		</div>
	</div>
	<div class="box box-default">
		<div class="box-header with-border">
		<?php
		$url = Url::toRoute(['supplier-list-request/submission']);
		?>
		  <h3 class="box-title"><a href="<?= $url ?>">Supplier List Request</a></h3>
		</div>
		<div class="box-body">
		  Form ini digunakan untuk melakukan pengajuan daftar/list supplier yang kami miliki.
		  Anda silakan mengisi form pengajuannya. Jika menurut kami memenuhi syarat dan ketentukan maka daftar list supplier tersebut akan kami kirimkan. 
		</div>
	</div>
</div>