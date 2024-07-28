<?php

use common\labeling\CommonActionLabelEnum;
use common\utils\EncryptionDB;
use backend\models\AppVocabularySearch;
use backend\models\AssetItemLocation;
use backend\models\AssetMaster;
use backend\models\AssetReceived;
use backend\models\Kabupaten;
use backend\models\Kecamatan;
use backend\models\Kelurahan;
use backend\models\Propinsi;
use backend\models\TypeAssetItem1;
use backend\models\TypeAssetItem2;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Pencarian Data Asset');
$this->params['breadcrumbs'][] = $this->title;
$datalist = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(AssetMaster::find()->all(), 'id_asset_master', 'asset_name');
$asset_code_list = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(AssetMaster::find()->all(), 'id_asset_master', 'asset_code');
$asset_type_asset_item1 = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(TypeAssetItem1::find()->all(), 'id_type_asset_item', 'type_asset_item');
$asset_type_asset_item2 = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(TypeAssetItem2::find()->all(), 'id_type_asset_item', 'type_asset_item');
$asset_received_list = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(AssetReceived::find()->all(), 'id_asset_received', 'notes1');
$asset_item_location_list = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(AssetItemLocation::find()->all(), 'id_asset_item_location', 'address');
$asset_propinsi = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(Propinsi::find()->all(), 'id_propinsi', 'nama_propinsi');
$asset_kelurahan = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(Kelurahan::find()->all(), 'id_kelurahan', 'nama_kelurahan');
$asset_kecamatan = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(Kecamatan::find()->all(), 'id_kecamatan', 'nama_kecamatan');
$asset_kabupaten = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(Kabupaten::find()->all(), 'id_kabupaten', 'nama_kabupaten');
$asset_item_keterangan_list = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(AssetItemLocation::find()->all(), 'id_asset_item_location', 'keterangan1');
$asset_item_latitude_list = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(AssetItemLocation::find()->all(), 'id_asset_item_location', 'latitude');
$asset_item_longitude_list = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(AssetItemLocation::find()->all(), 'id_asset_item_location', 'longitude');
$asset_item_batas_utara_list = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(AssetItemLocation::find()->all(), 'id_asset_item_location', 'batas_utara');
//$datatype_asset = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(AssetMaster::find()->all(), 'id_type_asset1', 'type_asset');

?>

<div class="box box-success">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
</div>

<!--<div class="box box-success">-->
<!--    <div class="box-header with-border">-->
<!--        --><?php //echo $this->render('_summary'); ?>
<!--    </div>-->
<!--</div>-->

<?php
if(isset($_GET['AssetItemSearch'])){

?>

<div class="asset-item-list box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
    <!--    --><?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php

    $models = $dataProviderDisplay->getModels();
    /*
    foreach($models as $model){
        echo "==>".$model->number1."<br>";
    }
    */
    ?>
    <?php /*
    Modal::begin(
        [
            'id' => 'modal',
            'header' => '<h4>Upload Image</h4>',
            'size' => 'modal-lg',
        ]);

    echo "<div id='modalContent'></div>";

    Modal::end();*/
    ?>
	
	<div class="box-header with-border">
       <?php echo $this->render('_summary', [
            'models' => $models,
        ]); ?>
    </div>
	
    <div class="box-body">
        <?php Pjax::begin(['id' => 'data-pjax="0"']); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'pjax' => false,
//            'striped' => true,
////            'responsive' => false,
            'responsiveWrap' => false,
//            'hover' => true,
            'tableOptions'=>['class'=>'table-striped table-bordered table-condensed'],
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-cube"></span> Data Asset'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'toolbar' => [
                [
                    'content' =>
                        Html::a(' <span class="fa fa-repeat"></span>', ['asset-item/list-search'], [
                            'class' => 'btn btn-default',
                            'title' => 'Refresh Data'
                        ]),

                ],
                '{toggleData}',
                '{export}'
            ],
            'export' => [
                'label' => 'Export',
            ],
            'exportConfig' => [
                GridView::EXCEL => [
                    'label' => 'Save as EXCEL',
                    'iconOptions' => ['class' => 'text-success'],
                    'showHeader' => true,
                    'showPageSummary' => true,
                    'showFooter' => true,
                    'showCaption' => true,
                    'filename' => 'Asset',
                    'alertMsg' => 'Export Data to Excel.',
                    'mime' => 'application/vnd.ms-excel',
                    'config' => [
                        'worksheet' => 'ExportWorksheet',
                        'cssFile' => ''
                    ],

                ],
                GridView::CSV => [
                    'label' => 'Save as CSV',
                    'iconOptions' => ['class' => 'text-primary'],
                    'showHeader' => true,
                    'showPageSummary' => true,
                    'showFooter' => true,
                    'showCaption' => true,
                    'filename' => 'Asset',
                    'alertMsg' => 'Export Data to CSV.',
                    'options' => ['title' => 'Comma Separated Values'],
                    'mime' => 'application/csv',
                    'config' => [
                        'colDelimiter' => ",",
                        'rowDelimiter' => "\r\n",
                    ],
                ],
            ],
            'columns' => [
                [
                    'header' => 'No',
                    'class' => 'kartik\grid\SerialColumn',
                    'hAlign' => GridView::ALIGN_CENTER,
                    'vAlign' => GridView::ALIGN_TOP,
                ],
				[
                    //'label' => 'Supplier Name',
                    'attribute' => 'assetMaster.asset_name',
                    'contentOptions' => ['style' => 'width:350px;  min-width:300px;  '],
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_supplier', $datalist, ['class' => 'form-control']),
                ],
                // [
                //     'attribute' => 'sensor.sensor_name',
                // ],
                /*
                [
                    //'label' => 'Supplier Name',
                    'attribute' => 'assetMaster.asset_code',
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_supplier', $datalist, ['class' => 'form-control']),
                ],
                */
                'number1',
                'number2',
                [
                    'label' => 'Type',
                    'attribute' => 'assetItemType1.type_asset_item',
                    'filter' => Html::activeDropDownList($searchModel, 'id_type_asset_item1', $asset_type_asset_item1, ['class' => 'form-control']),
                ],
                [
                    'label' => 'Status',
                    'attribute' => 'assetItemType2.type_asset_item',
                    'filter' => Html::activeDropDownList($searchModel, 'id_type_asset_item2', $asset_type_asset_item2, ['class' => 'form-control']),
                ],
				
				
                [
                    'header' => 'Action',
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'width: 120px;'],
                    'template' => '{view} {update} {delete}',
                ],
				

            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>

<div class="map-view box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Peta Geografi</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>

    <div class="box-body" style="">
        <?= $this->render('list-search/_map_multiple', [
            'models' => $models,
        ]) ?>
    </div>
</div>


<?php
}else{
	echo '
	<div class="callout callout-info">
		<h4>PETUNJUK PENCARIAN</h4>

		<p>Silakan pilih terlebih dahulu parameter yang akan dicari! Kemudian pilih tombol SEARCH</p>
	  </div>
	';
}
?>
