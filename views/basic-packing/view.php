<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BasicPacking */

//$this->title = $model->id_basic_packing;
$this->title = 'Detail ' . 'Basic Packing';
$this->params['breadcrumbs'][] = ['label' => 'Basic Packing', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body basic-packing-view">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_basic_packing], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_basic_packing], [
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
                'nama',
                'deskripsi',
            ],
        ]) ?>

    </div>
</div>

<?= $this->render('/basic-packing/item/index', [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'ip' => $id,
]) ?>