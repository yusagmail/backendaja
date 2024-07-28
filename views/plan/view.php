<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\PlanItemSearch;
/* @var $this yii\web\View */
/* @var $model backend\models\Plan */

//$this->title = $model->id_plan;
$this->title = 'Detail '.'Plan';
$this->params['breadcrumbs'][] = ['label' => 'Plan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asset-item-view box box-primary">
    <div class="box-header with-border">
        <p>

        <?= Html::a('<< Back', ['defecta/index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a('Update', ['defecta/update', 'id' => $model->id_defecta], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['defecta/delete', 'id' => $model->id_defecta], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>


	
	<div class="box-header with-border">
	  <h3 class="box-title">Informasi Defecta</h3>

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		</button>
		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	  </div>
	</div>
	<div class="box-body" style="">
    <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name_plan',
            'description:ntext',
            [
                'attribute' => 'Bulan',
                'format' => 'raw',
                'value' => function ($data) {
                    if (isset($data->defecta)) {
                        return $data->defecta->month;
                    } else {
                        return "--";
                    }
                },
                //'filter'=>Html::activeDropDownList($searchModel, 'id_gudang', $dataListMaterialKategori1, ['class' => 'form-control']),
            ],
            [
                'attribute' => 'Tahun',
                'format' => 'raw',
                'value' => function ($data) {
                    if (isset($data->defecta)) {
                        return $data->defecta->year;
                    } else {
                        return "--";
                    }
                },
                //'filter'=>Html::activeDropDownList($searchModel, 'id_gudang', $dataListMaterialKategori1, ['class' => 'form-control']),
            ],
            [
                'attribute' => 'Tanggal Permintaan',
                'format' => 'raw',
                'value' => function ($data) {
                    if (isset($data->defecta)) {
                        return $data->defecta->request_date;
                    } else {
                        return "--";
                    }
                },
                //'filter'=>Html::activeDropDownList($searchModel, 'id_gudang', $dataListMaterialKategori1, ['class' => 'form-control']),
            ],
            ],
        ]) ?>
	</div>
</div>
<div class="dokumentasi-view box box-primary">	
	<div class="box-header with-border">

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		</button>
		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	  </div>
	</div>

	<div class="box-header with-border">
    <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?//= $total_yard_awal ?></h3>

              <p>Total Perkiraan Harga Pembelian</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?//= $total_yard_hasil ?><sup style="font-size: 20px"></sup></h3>

              <p>Total Perkiraan Stock Yang Dibeli</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
      </div>
	</div>
</div>
    <div class="dokumentasi-view box box-primary">	
	<div class="box-header with-border">
	  <h3 class="box-title">Data Barang</h3>
      <h3>
    <?= Html::a('import', ['import', 'id' => $model->id_plan], ['class' => 'btn btn-primary']) ?>

    </h3>
	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		</button>
		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	  </div>
	</div>

	<div class="box-header with-border">
  <?php
                                
      $searchModel = new PlanItemSearch(['id_plan'=>$model->id_plan]);
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      echo $this->render('index-plan-item', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
      ]);
  ?>

	</div>