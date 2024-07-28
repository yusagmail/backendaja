<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\TypeAssetItem3;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TypeAssetItem3Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CommonActionLabelEnum::LIST_ALL . ' '. AppVocabularySearch::getValueByKey('Type Asset Item 3');
$this->params['breadcrumbs'][] = $this->title;

$datalist = ['' => CommonActionLabelEnum::CHOOSE, '1' => CommonActionLabelEnum::ACTIVE, '0' => CommonActionLabelEnum::IN_ACTIVE]
?>
<div class="type-asset-item3-index box box-success">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE . ' '. AppVocabularySearch::getValueByKey('Type Asset Item 3'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="box-body table-responsive">
        <?php

        $listColumnDynamic = AppFieldConfigSearch::getListGridView(TypeAssetItem3::tableName());

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
