<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AppEntityConfig */

$this->title = 'Create App Entity Config';
$this->params['breadcrumbs'][] = ['label' => 'App Entity Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-entity-config-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
