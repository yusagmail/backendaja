<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\StrukturMaterialItem */

$this->title = 'Detail ' . 'Struktur Material Item';
$this->params['breadcrumbs'][] = ['label' => 'Struktur Material Items', 'url' => ['/struktur-material/view?id=' . $model->id_struktur_material]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body struktur-material-item-view">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_struktur_material_item], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_struktur_material_item], [
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
                // 'id_struktur_material_item',
                // 'id_material_raw_kategori',
                [
                    'attribute' => 'id_material_raw_kategori',
                    'format' => 'raw',
                    'label' => 'Material Raw Kategori',
                    'value' => function ($data) {
                        if (isset($data->materialRawKategori)) {
                            return $data->materialRawKategori->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                // 'created_id_user',
                // 'created_date',
                // 'created_ip_address',
            ],
        ]) ?>

    </div>
</div>