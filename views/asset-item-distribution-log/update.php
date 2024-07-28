<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemDistributionLog */

$this->title = 'Update Asset Item Distribution Log';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Distribution Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_asset_item_distribution_log, 'url' => ['view', 'id' => $model->id_asset_item_distribution_log]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asset-item-distribution-log-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
