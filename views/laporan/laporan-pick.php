<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use backend\models\RequestPick;
use common\helpers\Timeanddate;

use backend\models\TypeOfSupplier;

/* @var $this yii\web\View */
/* @var $model backend\models\SupplierAssesment */

$this->title ="Laporan Pengambilan By Kurir";
//$this->params['breadcrumbs'][] = ['label' => 'Supplier Assesments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


	<div class="box-body">

		<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
			<?php
				$datas = RequestPick::find()
					//->orderBy('id_type_of_supplier')
					->all();
					
			?>
			</ul>
            <div class="tab-content">
              <?php
				    echo $this->render('pick/_graph_pick', [
							
						]);
					

			  ?>
            </div>
            <!-- /.tab-content -->
          </div>
	</div>

