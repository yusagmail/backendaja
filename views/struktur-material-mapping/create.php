<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StrukturMaterial */

$this->title = 'Tambah Struktur Material';
$this->params['breadcrumbs'][] = ['label' => 'Struktur Material', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body struktur-material">


        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>

</div>