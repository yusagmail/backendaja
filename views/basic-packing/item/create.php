<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BasicPackingItem */

$this->title = 'Create Basic Packing Item';
$this->params['breadcrumbs'][] = ['label' => 'Basic Packing Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="basic-packing-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
