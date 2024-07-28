<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemDistributionLog */

$this->title = 'Create Asset Item Distribution Log';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Distribution Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-item-distribution-log-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
