<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Defecta */

//$this->title = $model->title;
$this->title = 'Detail '.'Defecta';
$this->params['breadcrumbs'][] = ['label' => 'Defecta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body defecta-view">

                <p>
            <?= Html::a('<< Back', ['defecta/index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a('Update', ['defecta/update', 'id' => $model->id_defecta], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['defecta/delete', 'id' => $model->id_defecta], [
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
                'title',
                'request_date',
                //'month',
                //'year',
                [
                    'attribute' => 'id_gudang',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->gudang)) {
                            return $data->gudang->nama_gudang;
                        } else {
                            return "--";
                        }
                    },

                ],
            ],
        ]) ?>

    </div>
    <div class="defecta-details-view box box-primary">	
    <div class="box-header with-border">
    <h3>
        <?= Html::a('Tambah Data Barang', ['defecta-details/create', 'id' => $model->id_defecta], ['class' => 'btn btn-primary']) ?>
    </h3>
    <?=$this->render('@app/views/defecta-details/index', [
	        'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
	    ]) ?>
	</div>
</div>
</div>
