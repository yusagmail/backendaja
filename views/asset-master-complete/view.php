<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\AssetMaster;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMaster */

$this->title = CommonActionLabelEnum::VIEW . ' ' . AppVocabularySearch::getValueByKey('Asset Master');
$this->params['breadcrumbs'][] = ['label' => 'Asset Master', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asset-master-view box box-success">
    <div class="box-header with-border">
        <p>
            <?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a(CommonActionLabelEnum::UPDATE, ['update', 'id' => $model->id_asset_master], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(CommonActionLabelEnum::DELETE, ['delete', 'id' => $model->id_asset_master], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => CommonActionLabelEnum::CONFIRM_DELETE,
                    'method' => 'post',
                ],
            ]) ?>

        </p>

        <?php
        /*
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
//                'id_asset_master',
                'asset_name',
                'id_asset_code',
                'asset_code',
                [
                    'label' => 'Type Asset 1',
                    'attribute' => 'typeAsset1.type_asset'
                ],
                [
                    'label' => 'Type Asset 2',
                    'attribute' => 'typeAsset2.type_asset'
                ],
                [
                    'label' => 'Type Asset 3',
                    'attribute' => 'typeAsset3.type_asset'
                ],
                [
                    'label' => 'Type Asset 4',
                    'attribute' => 'typeAsset4.type_asset'
                ],
                [
                    'label' => 'Type Asset 5',
                    'attribute' => 'typeAsset5.type_asset'
                ],
                'attribute1',
                'attribute2',
                'attribute3',
                'attribute4',
                'attribute5',
            ],
        ])
        */
        ?>


        <?php
        $listColumnDynamic = AppFieldConfigSearch::getListDetailView(AssetMaster::tableName());

        //CustomColumn
        $coltypeAsset = [
            'attribute' => 'typeAsset1.type_asset',
            'label' => \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'id_type_asset1'),
        ];
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_type_asset1', $coltypeAsset);

        $coltypeAsset2 = [
            'attribute' => 'typeAsset2.type_asset',
            'label' => \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'id_type_asset2'),
        ];
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_type_asset2', $coltypeAsset2);

        echo DetailView::widget([
            'model' => $model,
            'attributes' => $listColumnDynamic,
        ]) ?>
    </div>
</div>
