<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Subcontractor */

$this->title = 'Update Master Kontraktor Makloon';
$this->params['breadcrumbs'][] = ['label' => 'Master Kontraktor Makloon', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Master Kontraktor Makloon', 'url' => ['view', 'id' => $model->id_subcontractor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
    <div class="box-body customer-update">


        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>