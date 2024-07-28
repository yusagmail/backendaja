<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AccountCode */

$this->title = 'Detail Account Codes';
$this->params['breadcrumbs'][] = ['label' => 'Account Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-header box box-primary account-code-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_account_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_account_code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id_account_code',
            'id_account_code_parent',
            'account_code',
            'account_name',
        ],
    ]) ?>

</div>
