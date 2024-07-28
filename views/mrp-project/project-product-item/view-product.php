<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\MrpProjectProductItem;
use backend\models\MrpProjectProductItemSearch;
/* @var $this yii\web\View */
/* @var $model backend\models\MrpProject */

//$this->title = $model->id_mrp_project;
$this->title = 'Detail '.'Project';
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
        $searchModel = new MrpProjectProductItemSearch();
        $searchModel->id_mrp_project = $model->id_mrp_project;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        echo $this->render('/mrp-project/project-product-item/_gantt_product_js_db', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'i' => $i
        ]);

        echo $this->render('/mrp-project/project-product-item/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'i' => $i
        ]);
        ?>

    </div>
</div>
