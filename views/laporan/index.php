<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use backend\models\SupplierAssesmentSearch;
use common\helpers\Timeanddate;

use backend\models\TypeOfSupplier;

/* @var $this yii\web\View */
/* @var $model backend\models\SupplierAssesment */

$this->title ="Summary of Supplier Assesments";
//$this->params['breadcrumbs'][] = ['label' => 'Supplier Assesments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


	<div class="box-body">

		<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
			<?php
				$datas = TypeOfSupplier::find()
					->orderBy('id_type_of_supplier')
					->all();
					
				foreach($datas as $data){
					$url = Url::toRoute(['summary-sa/index','t'=>$data->id_type_of_supplier]);
					$active="";
					if($t == $data->id_type_of_supplier){
						$active = "active";
					}
					echo '
					<li class="'.$active.'"><a href="'.$url.'" >'.$data->type_of_supplier.'</a></li>
					';
				}
			?>
			<?php /*
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">CPKO</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Manpower</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Chemical/Packaging</a></li>
			  <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">CNO</a></li>
            */ ?>
			</ul>
            <div class="tab-content">
              <?php
			  
			  switch($t){
				case 1: //CPKO
				    echo $this->render('cpko/_graph_cpko', [
							't' => $t,
						]);
					break;
					
				case 2: //Manpower
				    echo $this->render('manpower/_graph_manpower', [
							't' => $t,
						]);
					break;
					
				case 3: //Chemical/Packaging
				    echo $this->render('chemical/_graph_chemical', [
							't' => $t,
						]);
					break;
				
				case 4: //CNO
				    echo $this->render('cno/_graph_cno', [
							't' => $t,
						]);
					break;
			  }
			  
			  ?>
            </div>
            <!-- /.tab-content -->
          </div>
	</div>

