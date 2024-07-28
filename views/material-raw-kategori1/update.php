<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialRawKategori1 */

$this->title = 'Update Master George' . $model->id_material_raw_kategori;
$this->params['breadcrumbs'][] = ['label' => 'Master George', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_material_raw_kategori, 'url' => ['view', 'id_material_raw_kategori' => $model->id_material_raw_kategori]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
    <div class="box-body material-update">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>