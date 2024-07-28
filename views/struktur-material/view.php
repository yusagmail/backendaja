<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\StrukturMaterial */

$this->title = 'Detail ' . 'Struktur Material';
$this->params['breadcrumbs'][] = ['label' => 'Struktur Material', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body struktur-material-view">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_struktur_material], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_struktur_material], [
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
                // 'id_struktur_material',
                // 'id_material',
                [
                    'attribute' => 'id_material',
                    'format' => 'raw',
                    'label' => 'Material',
                    'value' => function ($data) {
                        if (isset($data->material)) {
                            return $data->material->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                // 'id_material_kategori1',
                [
                    'attribute' => 'id_material_kategori1',
                    'format' => 'raw',
                    'label' => 'Material Kategori 1',
                    'value' => function ($data) {
                        if (isset($data->materialKategori1)) {
                            return $data->materialKategori1->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                // 'id_material_kategori2',
                [
                    'attribute' => 'id_material_kategori2',
                    'format' => 'raw',
                    'label' => 'Material Kategori 2',
                    'value' => function ($data) {
                        if (isset($data->materialKategori2)) {
                            return $data->materialKategori2->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                // 'id_material_kategori3',
                [
                    'attribute' => 'id_material_kategori3',
                    'format' => 'raw',
                    'label' => 'Material Kategori 3',
                    'value' => function ($data) {
                        if (isset($data->materialKategori3)) {
                            return $data->materialKategori3->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
            ],
        ]) ?>

    </div>
</div>

<?= $this->render('/struktur-material/item/index', [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'ip' => $id,
]) ?>