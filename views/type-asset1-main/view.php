<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset1 */

$this->title = $model->id_type_asset;
$this->params['breadcrumbs'][] = ['label' => 'Type Asset1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="type-asset1-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_type_asset' => $model->id_type_asset], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_type_asset' => $model->id_type_asset], [
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
            'id_type_asset',
            'type_asset',
            'description:ntext',
            'is_active',
        ],
    ]) ?>

</div>
