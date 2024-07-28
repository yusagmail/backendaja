<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Supervisor */

$this->title = 'Update Teknisi: ' . $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Teknisi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_supervisor, 'url' => ['view', 'id_supervisor' => $model->id_supervisor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="supervisor-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
