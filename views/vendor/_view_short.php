<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>
<div class="box box-info">
	<div class="box-header with-border">
	  <h3 class="box-title">Informasi Supplier</h3>

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		</button>
		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	  </div>
	</div>
	<!-- /.box-header -->
	<div class="box-body" style="">
	  <div class="table-responsive">
<div class="col-md-6">
		<?= DetailView::widget([
			'model' => $model,
			'attributes' => [
				//'id_supplier',
                [
                        'attribute' => 'Nama Perusahaan',
                        'value' => $model->name
                ],
                [
                    'attribute' => 'Nama Group',
                    'value' => $model->company
                ],
				//'address',
				//'city',
				//'state',
				//'zip',
				//'country',
				//'email_address:email',
				//'phone_number',
				/*
				'id_type_of_supplier',
				'created_date',
				'created_time',
				'created_ip_address',
				'created_id_user',
				'id_user',
				*/
			],
		]) ?>
		</div>
		
		<div class="col-md-6">
		<?= DetailView::widget([
			'model' => $model,
			'attributes' => [
				//'id_supplier',
				//'name',
				//'company',
				//'address',
//				'city',
				//'state',
				//'zip',
                [
                    'attribute' => 'Alamat',
                    'value' => $model->address
                ],
				//'email_address:email',
				//'phone_number',
//				'id_type_of_supplier',
                [
                    'attribute' => 'Jenis Supplier',
                    'value' => $model->typeOfSupplier->type_of_supplier
                ],
                /*
                'created_date',
                'created_time',
                'created_ip_address',
                'created_id_user',
                'id_user',
                */
			],
		]) ?>
		</div>
	  </div>
	  <!-- /.table-responsive -->
	</div>
</div>
