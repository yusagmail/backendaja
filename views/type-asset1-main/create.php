<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset1 */

$this->title = 'Create Type Asset1';
$this->params['breadcrumbs'][] = ['label' => 'Type Asset1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-asset1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
