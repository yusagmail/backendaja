<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemMapping */

//$this->title = $model->id_asset_item_mapping;
$this->title = 'Detail '.'Asset Item Mapping';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Mapping', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body asset-item-mapping-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_asset_item_mapping], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_asset_item_mapping], [
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
                ],
        ]) ?>

    </div>
</div>
