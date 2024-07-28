<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\AssetItem_Generic;
use backend\models\Kabupaten;
use backend\models\Kecamatan;
use backend\models\Kelurahan;
use backend\models\TypeAssetItem1;
use backend\models\TypeAssetItem2;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = AppVocabularySearch::getValueByKey('Update Kondisi Aset');
$this->params['breadcrumbs'][] = $this->title;

$asset_type_asset_item1 = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(TypeAssetItem1::find()->all(), 'id_type_asset_item', 'type_asset_item');
$asset_type_asset_item2 = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(TypeAssetItem2::find()->all(), 'id_type_asset_item', 'type_asset_item');
$asset_kelurahan = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(Kelurahan::find()->all(), 'id_kelurahan', 'nama_kelurahan');
$asset_kecamatan = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(Kecamatan::find()->all(), 'id_kecamatan', 'nama_kecamatan');
$asset_kabupaten = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(Kabupaten::find()->all(), 'id_kabupaten', 'nama_kabupaten');


$datalist = ['' => CommonActionLabelEnum::CHOOSE, '1' => CommonActionLabelEnum::ACTIVE, '0' => CommonActionLabelEnum::IN_ACTIVE]
?>
<div class="asset-item-index box box-primary">
    <?php echo $this->render('/common/asset_item/_basic_search', ['model' => $searchModel]); ?>

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-body">
        <?php

        $listColumnDynamic = AppFieldConfigSearch::getListGridView(AssetItem_Generic::tableName(), "", false);

        /*
        $colIsActive = [
            'attribute' => 'is_active',
            'value' => function ($model) {
                return $model->is_active == 0 ? CommonActionLabelEnum::IN_ACTIVE : CommonActionLabelEnum::ACTIVE;
            },
            'filter' => Html::activeDropDownList($searchModel, 'is_active', $datalist, ['class' => 'form-control']),
        ];
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'is_active', $colIsActive);
        */
        /*
        $btnDetail =
                ['class' => 'yii\grid\ActionColumn',
                    'template' => ' {status-action}',  // the default buttons + your custom button
                    'header' => 'Detail',
                    'buttons' => [
                        'status-action' => function ($url, $model, $key) use ($c) {     // render your custom button
                            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_item);
                            $urlpeta = Url::toRoute(['/asset-in-asset/view-detail', 'ic' => $ic, 'c'=>$c]);
                            return Html::a('Detail', $urlpeta, ['class' => 'btn btn-sm btn-success']);
                        }
                ]];
        $listColumnDynamic[] = $btnDetail;
        */

        $listCol1 = [
            'label' => AppVocabularySearch::getValueByKey('Update Kondisi'),
            'format' => 'raw',
            'value' => function ($data) {
                return Html::a('Ubah Kondisi Aset', [''], ['class' => 'btn btn-sm btn-success ']);
            }
        ];
        $listColumnDynamic[] = $listCol1;

        echo GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            'columns' => $listColumnDynamic,
            'showPageSummary' => true,
            'pjax' => true,
            'striped' => true,
            'hover' => true,
            'responsiveWrap' => false,
            'panel' => ['type' => 'primary', 'heading' => 'Update Kondisi Aset'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        ]); ?>
    </div>
</div>
