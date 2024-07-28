<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LogActivity */

$this->title = 'Create Log Activity';
$this->params['breadcrumbs'][] = ['label' => 'Log Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-activity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
