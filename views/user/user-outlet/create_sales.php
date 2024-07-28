<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Tambah Pengguna Outlet';
$this->params['breadcrumbs'][] = ['label' => 'Data User / Pengguna System', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?= $this->render('/user/user-outlet/_form_sales', [
    'model' => $model,
    'i'=>$i,
    ]) ?>

</div>
