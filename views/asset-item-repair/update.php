<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemRepair */

$this->title = 'Update Asset Item Repair ';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Repairs', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asset-item-repair-update box box-primary">

    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
