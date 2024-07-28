<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AccountCode */

$this->title = 'Create Account Code';
$this->params['breadcrumbs'][] = ['label' => 'Account Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-code-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
