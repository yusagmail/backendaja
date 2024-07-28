<?php

use backend\models\Kabupaten;
use backend\models\Kecamatan;
use backend\models\Kelurahan;
use backend\models\Location;
use backend\models\Propinsi;
use backend\models\AppFieldConfigSearch;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
?>
<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }
</style>

<?php
//CSS Ini digunakan untuk overide jarak antar form biar tidak terlalu jauh
?>
<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>
<div class="box box-success by-location-search">
	<div class="box-header with-border">
	  <h3 class="box-title">Hasil Pencarian</h3>

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		</button>
		<?php /*
		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		*/ ?>
	  </div>
	</div>
    <div class="box-body">
    <table id="w0" class="table table-striped table-bordered detail-view">
        <?php 
        if(isset($_GET['LocationSearch'])){
            $get = $_GET['LocationSearch'];
            $id_location =  $get['id_location'];

            $location =  Location::find()->where([
                        'id_location' => $id_location,
                      ])->one();
            if($location != null){
        ?>
        <tr>
            <th><?php echo AppFieldConfigSearch::getLabelName("Location", "location_name")?></th>
            <td>
                <?php
                
                    if(isset($location->location_name)){
                        echo $location->location_name;
                    }else{
                        echo "--";
                    }
                ?>
            </td>
        </tr>
        <?php }} ?>

        <?php 
        if(isset($_GET['LocationSearch'])){
            $get = $_GET['LocationSearch'];
            $address =  $get['address'];

            if($address != ""){
        ?>
        <tr>
            <th><?php echo AppFieldConfigSearch::getLabelName("Location", "address")?></th>
            <td>
                <?php
                    echo $address;
                ?>
            </td>
        </tr>
        <?php }} ?>


        <?php if(isset($model->propinsi)) : ?>
        <tr>
            <th>Propinsi</th>
            <td>
                <?php
                
                    if(isset($model->propinsi)){
                        echo $model->propinsi->nama_propinsi;
                    }else{
                        echo "--";
                    }
                ?>
            </td>
        </tr>
        <?php endif; ?>
        <?php if(isset($model->kabupaten)) : ?>
        <tr>
            <th>Kabupaten</th>
            <td>
                <?php
                
                    if(isset($model->kabupaten)){
                        echo $model->kabupaten->nama_kabupaten;
                    }else{
                        echo "--";
                    }
                ?>
            </td>
        </tr>
        <?php endif; ?>
        <?php if(isset($model->kecamatan)) : ?>
        <tr>
            <th>Kabupaten</th>
            <td>
                <?php
                
                    if(isset($model->kecamatan)){
                        echo $model->kecamatan->nama_kecamatan;
                    }else{
                        echo "--";
                    }
                ?>
            </td>
        </tr>
        <?php endif; ?>
        <?php if(isset($model->kelurahan)) : ?>
        <tr>
            <th>Kabupaten</th>
            <td>
                <?php
                
                    if(isset($model->kelurahan)){
                        echo $model->kelurahan->nama_kelurahan;
                    }else{
                        echo "--";
                    }
                ?>
            </td>
        </tr>
        <?php endif; ?>
    </table>

    </div>
</div>

