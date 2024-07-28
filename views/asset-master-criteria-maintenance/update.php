<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterCriteriaMaintenance */

$this->title = 'Update Asset Master Criteria Maintenance ';
$this->params['breadcrumbs'][] = ['label' => 'Asset Master Criteria Maintenances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_asset_master_criteria_maintenance, 'url' => ['view', 'id' => $model->id_asset_master_criteria_maintenance]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asset-master-criteria-maintenance-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
