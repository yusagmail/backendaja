<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAssetItem1 */

$this->title = CommonActionLabelEnum::DETAIL." ". $mainLabel;
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL." ". $mainLabel, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body type-asset1-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_location], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_location], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?php /*
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'type_asset',
            'description:ntext',
            'is_active',
            ],
        ]) ?>
        */ ?>

        <?php
        $listColumnDynamic = AppFieldConfigSearch::getListDetailView(\backend\models\Location::tableName());

        echo DetailView::widget([
            'model' => $model,
            'attributes' => $listColumnDynamic,
        ]) ?>

    </div>
</div>
