<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\labeling\CommonActionLabelEnum;
use backend\models\AssetItem_Generic;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem_Generic */

$this->title = CommonActionLabelEnum::DETAIL.' '.AppVocabularySearch::getValueByKey('Inventarisasi Aset');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey('Type Asset 1'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="type-asset1-view box box-success">
    <div class="box-header with-border">

        <?php

        $tableName = AssetItem_Generic::tableName(); //Ini yang diganti (Nama tabel dari modelnya)
        $listColumnDynamic = AppFieldConfigSearch::getListDetailView($tableName,$varian_group);

        //CustomColumn
        $colStatus = [
            'attribute' => 'is_active',
            'value' => function ($model) {
                return $model->is_active == 0 ? CommonActionLabelEnum::IN_ACTIVE : CommonActionLabelEnum::ACTIVE;
            },
        ];
        //$listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'is_active', $colStatus);

        echo DetailView::widget([
            'model' => $model,
            'attributes' => $listColumnDynamic,
        ])
        ?>
    </div>
</div>
