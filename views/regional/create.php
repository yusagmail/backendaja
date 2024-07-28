<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Regional */

$this->title = 'Create Regional';
$this->params['breadcrumbs'][] = ['label' => 'Regionals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regional-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
