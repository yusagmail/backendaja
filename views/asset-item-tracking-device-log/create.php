<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemTrackingDeviceLog */

$this->title = 'Create Asset Item Tracking Device Log';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Tracking Device Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-item-tracking-device-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
