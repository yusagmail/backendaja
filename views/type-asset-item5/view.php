<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\TypeAssetItem5;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAssetItem5 */

$this->title = CommonActionLabelEnum::DETAIL . ' '. AppVocabularySearch::getValueByKey('Type Asset Item 5');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL . ' '. AppVocabularySearch::getValueByKey('Type Asset Item 5'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="type-asset-item5-view box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <div class="box-header with-border">
        <p>
            <?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a(CommonActionLabelEnum::UPDATE, ['update', 'id' => $model->id_type_asset_item], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(CommonActionLabelEnum::DELETE, ['delete', 'id' => $model->id_type_asset_item], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => CommonActionLabelEnum::CONFIRM_DELETE,
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?php
        $tableName = TypeAssetItem5::tableName(); //Ini yang diganti (Nama tabel dari modelnya)
        $listColumnDynamic = AppFieldConfigSearch::getListDetailView($tableName);

        //CustomColumn
        $colStatus = [
            'attribute' => 'is_active',
            'value' => function ($model) {
                return $model->is_active == 0 ? CommonActionLabelEnum::IN_ACTIVE : CommonActionLabelEnum::ACTIVE;
            },
        ];
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'is_active', $colStatus);

        echo DetailView::widget([
            'model' => $model,
            'attributes' => $listColumnDynamic,
        ])
        ?>
    </div>

</div>
