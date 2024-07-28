<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\MrpProjectProductItem;
use backend\models\MrpProjectProductItemSearch;
/* @var $this yii\web\View */
/* @var $model backend\models\MrpProject */

//$this->title = $model->id_mrp_project;
$this->title = 'Structure '.'Product Detail';
$this->params['breadcrumbs'][] = ['label' => 'Project', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body mrp-project-product-item-create">

        
        <?= $this->render('../_view_project', [
            'model' => $model,
        ]) ?>

        <?php
            $model = \backend\models\StructureProduct::find()->where([
                    'result_id_mst_product_component' => $id_mst_product_component,
                    'id_mrp_project' => $id_mrp_project
            ])
            ->one();
            if($model != null){
                $produk = "";
                if (isset($model->finalProduct)) {
                    $produk =  $model->finalProduct->nama;
                } else {
                    $produk =  "--";
                }
               echo '<div class="alert alert-info">Struktur Produk '.$produk.'</div>';
            }else{
                $model = new \backend\models\StructureProduct();
                $model->result_id_mst_product_component = $id_mst_product_component;
                $model->id_mrp_project = $id_mrp_project;
                $model->save(false);

                echo '<div class="alert alert-info">Struktur baru siap dibuat!</div>';
            }

            //_chart_structure_product4 --> stabil tapi masih raw/mentah
            echo $this->render('/mrp-project/structure-product-item-detail/_chart_structure_product11', [
            'model' => $model,

            'i' => $i
        ]);
        ?>

    </div>
</div>
