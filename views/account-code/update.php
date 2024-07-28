<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AccountCode */

$this->title = 'Update Account Code' ;
$this->params['breadcrumbs'][] = ['label' => 'Account Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_account_code, 'url' => ['view', 'id' => $model->id_account_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="account-code-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
