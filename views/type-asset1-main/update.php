<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset1 */

$this->title = 'Update Type Asset1: ' . $model->id_type_asset;
$this->params['breadcrumbs'][] = ['label' => 'Type Asset1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_type_asset, 'url' => ['view', 'id_type_asset' => $model->id_type_asset]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-asset1-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
