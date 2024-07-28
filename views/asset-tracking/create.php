<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem */

$this->title = 'Create Asset Items';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-item-create">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
