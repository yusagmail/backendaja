<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Supervisor */

$this->title = 'Create Teknisi';
$this->params['breadcrumbs'][] = ['label' => 'Supervisors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supervisor-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
