<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Subcontractor */

$this->title = 'Tambah Master Kontraktor Makloon';
$this->params['breadcrumbs'][] = ['label' => 'Master Kontraktor Makloon', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body customer-create">


        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>