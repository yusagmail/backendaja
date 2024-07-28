<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterCriteriaMaintenance */

$this->title = 'Create Asset Master Criteria Maintenance';
$this->params['breadcrumbs'][] = ['label' => 'Asset Master Criteria Maintenances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-master-criteria-maintenance-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
