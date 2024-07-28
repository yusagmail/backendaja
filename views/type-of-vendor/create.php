<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeOfSupplier */

$this->title = 'Create Type Of Supplier';
$this->params['breadcrumbs'][] = ['label' => 'Type Of Supplier', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-of-supplier-create">

<!--    <h1>--><?php Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
