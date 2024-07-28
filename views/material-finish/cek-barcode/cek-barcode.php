<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialFinish */

//$this->title = $model->id_material_finish;
$this->title = 'Cek Barcode';
//$this->params['breadcrumbs'][] = ['label' => 'Barang Jadi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body material-finish-view">
        <div class="callout callout-success">
        <h4>Petunjuk</h4>

        <p>Silakan scan barang dengan barcode reader atau jika tidak memungkinkan silakan ketikkan secara manual. 
            Jika sudah tekan enter atau tombol CEK.
        </p>
        </div>
        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-12">
            <input type="text" class="form-control" placeholder="Silakan scan barcode atau ketik manual" >
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12">
            <input type="button" value="CEK" class="btn btn-danger btn-block">
            </div>
        </div>
    </div> 
</div>
