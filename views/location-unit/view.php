<?php

use backend\models\AppVocabularySearch;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\LocationUnit */


$baseName = AppVocabularySearch::getValueByKey(' Lihat Location Unit');
$this->title = $baseName;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="location-unit-view box box-primary location-view">
    <div class="box-header with-border">
        <?= Html::a('<< Back', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id_location], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_location], [
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
//            'id_location_unit',
            'location.location_name',
            'owner.name',
            'label1',
            'label2',
            'label3',
            'keterangan1',
            'keterangan2',
            'keterangan3',
        ],
    ]) ?>
    </div>
</div>
