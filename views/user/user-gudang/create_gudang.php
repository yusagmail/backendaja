<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Tambah Pengguna Gudang';
$this->params['breadcrumbs'][] = ['label' => 'Data Pengguna di Gudang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?= $this->render('/user/user-gudang/_form_gudang', [
    'model' => $model,
    'i'=>$i,
    ]) ?>

</div>
