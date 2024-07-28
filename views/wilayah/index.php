<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use backend\models\AppFieldConfigSearch;
use backend\models\Kabupaten;
use backend\models\Kecamatan;
use backend\models\Kelurahan;
use backend\models\Propinsi;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KelurahanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Wilayah');
$this->params['breadcrumbs'][] = $this->title;

$dataPropinsi = ['' => 'Pilih'] + ArrayHelper::map(Propinsi::find()->all(), 'id_propinsi', 'nama_propinsi');
$dataKecamatan = ['' => 'Pilih'] + ArrayHelper::map(Kecamatan::find()->all(), 'id_kecamatan', 'nama_kecamatan');
$dataKabupaten = ['' => 'Choose'] + ArrayHelper::map(Kabupaten::find()->all(), 'id_kabupaten', 'nama_kabupaten');

?>
<div class="kelurahan-index">
    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'responsiveWrap' => false,
//            'hover' => true,
            'tableOptions'=>['class'=>'table-striped table-bordered table-condensed'],
            'panel' => ['type' => 'primary', ],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'toolbar' => [
                [
                    'content' =>
                        Html::a(' <span class="fa fa-repeat"></span>', ['index'], [
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
                    'class' => 'yii\grid\SerialColumn'
                ],

                [
                    'attribute' => 'provinsi.nama_propinsi',
                    // 'filter' => Html::activeDropDownList($searchModel, 'id_propinsi', $dataPropinsi, ['class' => 'form-control']),
                    'filter' => \kartik\select2\Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'id_propinsi',
                        'data' => ArrayHelper::map(Propinsi::find()->all(), 'id_propinsi', 'nama_propinsi'),
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                        'options' => [
                            'prompt' => 'Pilih Propinsi ...']
                    ]),
                ],

                [
                    'attribute' => 'nama_kabupaten',
                    // 'filter' => Html::activeDropDownList($searchModel, 'id_kabupaten', $dataKabupaten, ['class' => 'form-control']),
                    'filter' => \kartik\select2\Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'id_kabupaten',
                        'data' => ArrayHelper::map(Kabupaten::find()->all(), 'id_kabupaten', 'nama_kabupaten'),
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                        'options' => [
                            'prompt' => 'Pilih Kabupaten ...']
                    ]),
                ],

                [
                    'header' => 'kecamatan',
                    'format'=>'raw',
                    'value' => function($data) {
                        return implode(',',\yii\helpers\ArrayHelper::map($data->kecamatan, 'id_kecamatan', 'nama_kecamatan'));//,->count();
                    },
                ],
                [
                        'header' => 'kelurahan',
                        'value' => function($data) {
                        $string =implode(',',\yii\helpers\ArrayHelper::map($data->kecamatan, 'id_kecamatan', 'id_kecamatan')); 
                   $query=explode(',', $string);
                        $html=[];
                        foreach($query as $val){
                                $kecamatan = $val;
                                $queryKelurahan = Kelurahan::dataKelurahanbyKecamatan($kecamatan);
                                foreach ($queryKelurahan as $kel){
                                $html[]=$kel['nama_kelurahan'];
                                }
                        }
                        return implode(',',$html);
                        }
                ],

                /*[
                    'header' => 'Action',
                    'class' => 'yii\grid\ActionColumn'
                ],*/
            ],
        ]); ?>
</div>
