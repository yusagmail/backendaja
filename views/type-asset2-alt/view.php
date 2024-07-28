<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\TypeAsset2;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset2 */

$this->title = CommonActionLabelEnum::DETAIL . ' ' . AppVocabularySearch::getValueByKey('Type Asset 2');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST . ' ' . AppVocabularySearch::getValueByKey('Type Asset 2'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="type-asset2-view box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <div class="box-header with-border">
        <p>
            <?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a(CommonActionLabelEnum::UPDATE, ['update', 'id' => $model->id_type_asset], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(CommonActionLabelEnum::DELETE, ['delete', 'id' => $model->id_type_asset], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => CommonActionLabelEnum::CONFIRM_DELETE,
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?php
        $tableName = TypeAsset2::tableName(); //Ini yang diganti (Nama tabel dari modelnya)
        $listColumnDynamic = AppFieldConfigSearch::getListDetailView($tableName);

        //CustomColumn
        $colStatus = [
            'attribute' => 'is_active',
            'value' => function ($model) {
                return $model->is_active == 0 ? 'Not Active' : 'Active';
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
