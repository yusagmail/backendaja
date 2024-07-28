<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterMapYear */

$this->title = 'Update Asset Master Map Year: ' . $model->id_asset_master_map_year;
$this->params['breadcrumbs'][] = ['label' => 'Asset Master Map Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_asset_master_map_year, 'url' => ['view', 'id' => $model->id_asset_master_map_year]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asset-master-map-year-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
