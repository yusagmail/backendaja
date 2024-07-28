<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialSampel */

$this->title = 'Tambah Material Sampel';
$this->params['breadcrumbs'][] = ['label' => 'Material Sampel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body material-sampel-raw">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
