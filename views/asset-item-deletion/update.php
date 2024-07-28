<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemDeletion */

$this->title = 'Update Asset Item Deletion';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Deletions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_asset_item_deletion, 'url' => ['view', 'id' => $model->id_asset_item_deletion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asset-item-deletion-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
