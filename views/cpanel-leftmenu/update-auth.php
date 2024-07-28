<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CpanelLeftmenu */

$this->title = 'Update Auth';
$this->params['breadcrumbs'][] = ['label' => 'Menu Auth Aplikasi', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_leftmenu, 'url' => ['view', 'id' => $model->id_leftmenu]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cpanel-leftmenu-update">

    <?= $this->render('_form_auth', [
        'model' => $model,
    ]) ?>

</div>
