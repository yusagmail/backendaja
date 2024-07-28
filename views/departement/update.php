<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Departement */

$this->title = 'Update Departement: ' . $model->id_departement;
$this->params['breadcrumbs'][] = ['label' => 'Departements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_departement, 'url' => ['view', 'id' => $model->id_departement]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="departement-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
