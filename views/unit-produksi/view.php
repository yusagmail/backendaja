<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitProduksi */

//$this->title = $model->id_unit_produksi;
$this->title = 'Detail '.'Unit Produksi';
$this->params['breadcrumbs'][] = ['label' => 'Unit Produksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body unit-produksi-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_unit_produksi], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_unit_produksi], [
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
                'nama_unit',
            'lokasi',
            'foto1',
            'desc_fungsi',
            'desc_material_in',
            'desc_proses',
            'desc_material_out',
            'jumlah_operator',
            ],
        ]) ?>

    </div>
</div>
