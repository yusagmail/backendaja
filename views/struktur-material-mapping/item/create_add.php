<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BasicPackingItem */

$this->title = 'Tambah Struktur Material Item';
$this->params['breadcrumbs'][] = ['label' => 'Struktur Material Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body struktur-material-item-create">

        <?= $this->render('_form_add', [
            'model' => $model,
        ]) ?>

    </div>
</div>