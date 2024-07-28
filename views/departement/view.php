<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Departement */

$this->title = $model->departement_name;
$this->params['breadcrumbs'][] = ['label' => 'Departements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-header box box-primary departement-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_departement], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_departement], [
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
//            'id_departement',
            'departement_name',
            'description',
            'is_active',
        ],
    ]) ?>

</div>
