<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BasicPackingItem */

$this->title = 'Create Basic Packing Item';
$this->params['breadcrumbs'][] = ['label' => 'Basic Packing Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body basic-packing-item-create">

        <?= $this->render('_form_add', [
            'model' => $model,
        ]) ?>

    </div>
</div>