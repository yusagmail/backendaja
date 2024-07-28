<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialRawKategori1 */

// $this->title = $model->id_material_raw_kategori;
$this->title = 'Detail ' . 'Master Geirge';
$this->params['breadcrumbs'][] = ['label' => 'Master Geirge', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body material-view">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_material_raw_kategori], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_material_raw_kategori], [
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
                'kode',
                'nama',
                'is_active',
            ],
        ]) ?>

    </div>
</div>