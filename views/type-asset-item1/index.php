<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\TypeAssetItem1;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TypeAssetItem1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CommonActionLabelEnum::LIST_ALL ." ". AppVocabularySearch::getValueByKey('Type Asset Item 1');
$this->params['breadcrumbs'][] = $this->title;

$datalist = ['' => CommonActionLabelEnum::CHOOSE, '1' => CommonActionLabelEnum::ACTIVE, '0' => CommonActionLabelEnum::IN_ACTIVE]
?>
<div class="type-asset-item1-index box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE ." ". AppVocabularySearch::getValueByKey('Type Asset Item 1'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="box-body table-responsive">
        <?php

        $listColumnDynamic = AppFieldConfigSearch::getListGridView(TypeAssetItem1::tableName());

        $colIsActive = [
            'attribute' => 'is_active',
            'value' => function ($model) {
                return $model->is_active == 0 ? CommonActionLabelEnum::IN_ACTIVE : CommonActionLabelEnum::ACTIVE;
            },
            'filter' => Html::activeDropDownList($searchModel, 'is_active', $datalist, ['class' => 'form-control']),
        ];
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'is_active', $colIsActive);

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' =>  $listColumnDynamic
        ]); ?>
    </div>
</div>
