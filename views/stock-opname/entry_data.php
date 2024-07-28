<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Gudang;
use backend\models\GudangSearch;
use backend\models\StockOpnameItemSearch;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $model backend\models\StockOpname */

//$this->title = $model->id_stock_opname;
$this->title = 'Entry '.'Data Opname';
$this->params['breadcrumbs'][] = ['label' => 'Stock Opname', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body stock-opname-view">

        <?= $this->render('_view_stock_opname', [
            'model' => $model,
        ]) ?>

        <?php
        //Informasi Gudang
        echo '
                <div class="small-box bg-red">
                    <div class="inner text-right">
                      <h4>GUDANG : '.$gudang->nama_gudang.'</h4>
                    </div>
                </div>
        ';
        ?>

        <?php 
        $searchModel = new StockOpnameItemSearch();
        $searchModel->id_stock_opname = $id_stock_opname;
        $searchModel->id_gudang = $id_gudang;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;
        //$dataProvider->pagination = false;
        //$pagination = 10;
        
        //$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        $dataProvider->sort->defaultOrder = ['entry_time' => SORT_DESC];

        echo $this->render('/stock-opname/entry-data/index-multi', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'g' =>$g,
            'i'=>$i,
            'ip'=> $i, //Sementara
            'opt'=>$opt,
            'id_stock_opname'=>$id_stock_opname,
            'id_gudang'=> $id_gudang,
        ]) ?>

        

    </div>
</div>
