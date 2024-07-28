<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialInItemProc */

$this->title = 'Update Material In Item Proc';
$this->params['breadcrumbs'][] = ['label' => 'Material In Item Proc', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_material_in_item_proc]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
    <div class="box-body material-in-item-proc-update">


        <?= $this->render('_form_add', [
            'model' => $model,
        ]) ?>

    </div>
</div>