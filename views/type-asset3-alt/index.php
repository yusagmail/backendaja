<?php

use yii\grid\GridView;
use yii\helpers\Html;
use backend\models\AppFieldConfigSearch;
use backend\models\TypeAsset3;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TypeAsset3Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title =  CommonActionLabelEnum::LIST.' '. AppVocabularySearch::getValueByKey('Type Asset 3');
$this->params['breadcrumbs'][] = $this->title;

$datalist = ['' => 'Choose', '1' => 'Active', '0' => 'No Active']
?>
<div class="type-asset3-index box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey('Type Asset 3'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="box-body table-responsive">
        <?php

        $listColumnDynamic = AppFieldConfigSearch::getListGridView(TypeAsset3::tableName());

        //CustomColumn
        $colIsActive = [
            'attribute' => 'is_active',
            'value' => function ($model) {
                return $model->is_active == 0 ? 'Not Active' : 'Active';
            },
            'filter'=>Html::activeDropDownList($searchModel, 'is_active', $datalist, ['class' => 'form-control']),
        ];
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'is_active', $colIsActive);

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $listColumnDynamic
        ]); ?>
    </div>
</div>
