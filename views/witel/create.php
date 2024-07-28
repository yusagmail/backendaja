<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Witel */

$this->title = 'Create Witel';
$this->params['breadcrumbs'][] = ['label' => 'Witels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="witel-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
