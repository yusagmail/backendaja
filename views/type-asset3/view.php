<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset3 */

//$this->title = $model->id_type_asset;
$this->title = 'Detail '.'Type Asset 3';
$this->params['breadcrumbs'][] = ['label' => 'Type Asset 3', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body type-asset3-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_type_asset], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_type_asset], [
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
                'type_asset',
            'description:ntext',
            'is_active',
            ],
        ]) ?>

    </div>
</div>
