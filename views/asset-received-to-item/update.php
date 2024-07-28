<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetReceivedToItem */

$this->title = 'Update Asset Received To Item: ' . $model->id_asset_received_to_item;
$this->params['breadcrumbs'][] = ['label' => 'Asset Received To Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_asset_received_to_item, 'url' => ['view', 'id' => $model->id_asset_received_to_item]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asset-received-to-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
