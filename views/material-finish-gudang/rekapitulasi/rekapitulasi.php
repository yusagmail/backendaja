<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\helpers\Timeanddate;
use backend\models\MaterialFinish;
use backend\models\MaterialFinishSearch;

/* @var $this yii\web\View */
/* @var $model backend\models\SupplierAssesment */

$this->title = "Rekapitulasi Stock";
//$this->params['breadcrumbs'][] = ['label' => 'Supplier Assesments', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<div class="box-body">
	<div class="row">
		<div class="col-lg-6 col-xs-12">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3><?= $total_roll ?></h3>

					<p>Total Roll</p>
				</div>
				<div class="icon">
					<i class="ion ion-bag"></i>
				</div>
				<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
			</div>
		</div>

		<div class="col-lg-6 col-xs-12">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3><?= $jenis_kain ?></h3>

					<p>Jenis Kain</p>
				</div>
				<div class="icon">
					<i class="ion ion-pie-graph"></i>
				</div>
				<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
			</div>
		</div>
		<!-- ./col -->
	</div>

	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<?php
			for ($i = 1; $i <= 4; $i++) {
				$url = Url::toRoute(['material-finish/rekapitulasi-stok', 't' => $i]);
				$active = "";
				if ($t == $i) {
					$active = "active";
				}
				echo '
					<li class="' . $active . '"><a href="' . $url . '" >Level' . $i . '</a></li>
					';
			}
			?>
		</ul>
		<div class="tab-content">
			<?php

			switch ($t) {
				case 1:
					$searchModel = new MaterialFinishSearch();
					$dataProvider = $searchModel->searchGroupBy(Yii::$app->request->queryParams);
					echo $this->render('rekapitulasi-stok', [
						'searchModel' => $searchModel,
						'dataProvider' => $dataProvider,
						't' => $t,
					]);
					break;

				case 2:
					$searchModel = new MaterialFinishSearch();
					$dataProvider = $searchModel->searchGroupByKategori1(Yii::$app->request->queryParams);
					echo $this->render('rekapitulasi-stok-kategori1', [
						'searchModel' => $searchModel,
						'dataProvider' => $dataProvider,
						't' => $t,
					]);
					break;

				case 3:
					$searchModel = new MaterialFinishSearch();
					$dataProvider = $searchModel->searchGroupByKategori2(Yii::$app->request->queryParams);
					echo $this->render('rekapitulasi-stok-kategori2', [
						'searchModel' => $searchModel,
						'dataProvider' => $dataProvider,
						't' => $t,
					]);
					break;

				case 4:
					$searchModel = new MaterialFinishSearch();
					$dataProvider = $searchModel->searchGroupByKategori3(Yii::$app->request->queryParams);
					echo $this->render('rekapitulasi-stok-kategori3', [
						'searchModel' => $searchModel,
						'dataProvider' => $dataProvider,
						't' => $t,
					]);
					break;
			}

			?>
		</div>
		<!-- /.tab-content -->
	</div>
</div>