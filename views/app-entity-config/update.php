<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AppEntityConfig */

$this->title = 'Update App Entity Config: ' . $model->id_app_entity_config;
$this->params['breadcrumbs'][] = ['label' => 'App Entity Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_app_entity_config, 'url' => ['view', 'id' => $model->id_app_entity_config]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="app-entity-config-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
