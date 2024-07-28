<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Update User';
$this->params['breadcrumbs'][] = ['label' => 'Data Pengguna di Outlet', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">
    <?= $this->render('../_view', [
        'model' => $model,
    ]) ?>
    <?= $this->render('/user/user-gudang/_form_gudang_update', [
        'model' => $model,
    ]) ?>

</div>
