<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Witel */

$this->title = 'Update Witel: ' . $model->id_witel;
$this->params['breadcrumbs'][] = ['label' => 'Witels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_witel, 'url' => ['view', 'id_witel' => $model->id_witel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="witel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
