<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetReceivedToItem */

$this->title = 'Create Asset Received To Item';
$this->params['breadcrumbs'][] = ['label' => 'Asset Received To Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-received-to-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
