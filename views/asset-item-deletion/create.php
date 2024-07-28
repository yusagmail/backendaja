<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemDeletion */

$this->title = 'Create Asset Item Deletion';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Deletions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-item-deletion-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
