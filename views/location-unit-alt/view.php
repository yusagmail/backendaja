<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\Location;
use backend\models\LocationUnit;

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
            <?= Html::a('Update', ['update', 'id' => $model->id_location_unit], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_location_unit], [
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
        $listColumnDynamic = AppFieldConfigSearch::getListDetailView(\backend\models\LocationUnit::tableName());

        //CustomColumn
        $colLocation = [
            'attribute' => 'location.location_name',
            'label' => \backend\models\AppFieldConfigSearch::getLabelName(LocationUnit::tableName(), 'id_location'),
        ];
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_location', $colLocation);

        echo DetailView::widget([
            'model' => $model,
            'attributes' => $listColumnDynamic,
        ]) ?>

    </div>
</div>
