<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Departement */

$this->title = 'Create Departement';
$this->params['breadcrumbs'][] = ['label' => 'Departements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departement-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
