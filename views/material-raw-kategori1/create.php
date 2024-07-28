<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialRawKategori1 */

$this->title = 'Tambah Data Master Greige';
$this->params['breadcrumbs'][] = ['label' => 'Master Greige', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body material-create">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>