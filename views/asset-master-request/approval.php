<?php

use backend\models\AppVocabularySearch;
use kartik\form\ActiveForm;
use kartik\grid\GridView;
use yii\helpers\Html;

//use kartik\builder\Form;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetMasterRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = AppVocabularySearch::getValueByKey('Approval Aset');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$this->registerJs("$('#edit_modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id_asset_master_request = button.data('id_asset_master_request')
        var requested_by = button.data('requested_by')
        var request_notes = button.data('request_notes')
        var approved_status = button.data('approved_status')
        var param1 = button.data('param1')
        var modal = $(this)
        modal.find('.modal-body input#id_asset_master_request').val(id_asset_master_request)
        modal.find('.modal-body input#requested_by').val(requested_by)
        modal.find('.modal-body input#request_notes').val(request_notes)
        modal.find('.modal-body select#approved_status').val(approved_status)
        modal.find('.modal-body input#param1').val(param1)

        
    });");
$this->registerJs(
    "
                $('#update').on('click', function() {
                    var btn = $(this);
                    btn.button('loading');
                    // Then whatever you actually want to do i.e. submit form
                    // After that has finished, reset the button state using
                    setTimeout(function () {
                    btn.button('reset');
                     }, 999990);
                   });
        "
)
?>
<?php
yii\bootstrap\Modal::begin(['id' => 'modal2',
    'size' => 'modal-lg',]);

yii\bootstrap\Modal::end();
?>
<div class="box box-success">
    <?php echo $this->render('_search_approval', ['model' => $searchModel]); ?>
</div>
<?php $form = ActiveForm::begin();
?>
<?php
yii\bootstrap\Modal::begin([
    'id' => 'imageview',
    'footer' => '<a href="#" class="btn btn-sm btn-primary" data-dismiss="modal">Close</a>',]);

yii\bootstrap\Modal::end();
?>
<?php //FormGrid::widget([
//    'model' => $model,
//    'form' => $form,
//    'autoGenerateColumns' => true,
//    'rows' => [
//        [
//            'attributes' => [
//                'request_date' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter username...']],
//            ],
//        ],
////        [
////            'attributes' => [
////                'first_name' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter first name...']],
////                'last_name' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter last name...']],
////            ]
////        ]
//    ]
//]);?>

<!-- FORM ABULAR-->
<?php //TabularForm::widget([
//    'dataProvider'=>$dataProvider,
//    'form'=>$form,
//    'checkboxColumn' => false,
//    'actionColumn' => false,
//     'attributes'=>[
//                     'assetMaster'=>[
//                         'type'=>TabularForm::INPUT_STATIC,
//                         'label'=>'Nama Barang',
//                         'columnOptions'=>['hAlign'=>GridView::ALIGN_LEFT, 'width'=>'auto']],
//                     'request_date'=>[
//                         'type'=>TabularForm::INPUT_STATIC,
//                         'label'=>'Request Date',
//                         'columnOptions'=>['hAlign'=>GridView::ALIGN_CENTER, 'width'=>'auto']],
////                    'request_date' =>['type'=> TabularForm::INPUT_TEXT,'container' => ['div' => 'teste']],
//                    'request_notes' =>['type'=> TabularForm::INPUT_TEXT,'container' => ['div' => 'teste'],
//                        'columnOptions'=>['hAlign'=>GridView::ALIGN_CENTER, 'width'=>'auto']],
//                    'requested_by'=>['type'=> TabularForm::INPUT_TEXT,'container' => ['div' => 'teste'],
//                        'columnOptions'=>['hAlign'=>GridView::ALIGN_CENTER, 'width'=>'auto']],
//                ],
//    'gridSettings'=>[
//        'condensed'=>true,
//        'floatHeader'=>true,
//        'panel'=>[
//            'heading' => '<span class="fa fa-check"></span> Approval Asset',
//            'before' => false,
//            'type' => GridView::TYPE_PRIMARY,
//            'after'=>
////                Html::submitButton('<i class="fa fa-save"></i> Save', ['class'=>'btn btn-primary']),
//                Html::submitButton(
//                '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
//                ['class'=>'btn btn-primary']
//            )
//        ],
//    ],
//
//
//]);
//?>
<?php $ambildata = [
    'requested_by',
    'approved_status'
];
$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    //'assetMaster.asset_name',
	[
		'label' => 'Kategori Aset',
		'attribute' =>  'assetMaster.asset_name',
		//'filter'=>Html::activeDropDownList($searchModel, 'id_type_asset1', $dataList1, ['class' => 'form-control']),
	],	
	'quantity',
    'request_date',

//            'request_datetime',
    [
        'class' => 'dosamigos\grid\columns\EditableColumn',
        'attribute' => 'requested_by',
        'url' => 'editable',
        'type' => 'text',
        'editableOptions' => function ($model, $key, $index) use ($ambildata) {
            return [
                'size' => 'sm',
                'mode' => 'inline',
                'format' => 'raw',
            ];
        }
    ],
//    [
//        'class' => 'kartik\grid\EditableColumn',
//        'attribute' => 'requested_by',
//        'vAlign' => 'middle',
//        'width' => '210px',
//        'editableOptions' =>  function ($model, $key, $index){
//            return [
//                'header' => 'Data',
//                'formOptions' => ['action'=>'editable'] ,
//                'size' => 'sm',
//                'afterInput' => function ($form, $widget) use ($model, $index) {
//                    return $form->field($model, "request_notes")->textarea(['rows' => 6]);
//                }
//            ];
//        }
//    ],
    //'request_notes',
	/*
    [
        'attribute' => 'approved_status',
        'value' => function ($model, $key, $index) use ($ambildata) {

            return app\common\labeling\ApprovalLabel::getApprovalKode($model->approved_status);
        }
    ],
	*/
    [
        'attribute' => 'approved_status',
        'label' => '<abbr title="Status Action">Approval Status</abbr>',
        'encodeLabel' => false,
        'headerOptions' => ['style'=>'text-align:center; width: 150px'],
        'contentOptions' => function ($model, $key, $index) use ($ambildata) {
            return [
				'style' => 'text-color : white; background-color:'
                . (app\common\labeling\ApprovalLabel::getColorApprovalKode($model->approved_status)), 
				'class' => 'text-center text-gray',
			];
        },
		'value' => function ($model, $key, $index) use ($ambildata) {

            return app\common\labeling\ApprovalLabel::getApprovalKode($model->approved_status);
        }
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{update-device}',
        'header' => 'Approval',
        'buttons' => [
            'update-device' => function ($url, $model, $key) {
                return Html::a('<span class="btn btn-success btn-sm">UBAH APPROVAL STATUS</span>', null, [
                    'class' => '',
                    'data' => [
                        'toggle' => 'modal',
                        'target' => '#edit_modal',
                        'id_asset_master_request' => $model->id_asset_master_request,
                        'requested_by' => $model->requested_by,
                        'request_notes' => $model->request_notes,
                        'approved_status' => $model->approved_status,

                    ],
                ]);

            },
            'delete' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id_asset_master_request], [
                    'class' => '',
                    'data' => [
                        'confirm' => 'Are you absolutely sure ? You will lose all the information about this user with this action.',
                        'method' => 'post',
                    ],
                ]);
            },

        ],
    ],
]; ?>
<?= GridView::widget([
    'id' => 'kv-grid-demo',
    'dataProvider' => $dataProvider,
    'pjax' => true,
    'responsiveWrap' => false,
    'tableOptions' => ['class' => 'table-striped table-bordered table-condensed'],
    'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-check"></span> Approval Asset'],
    'toggleDataContainer' => ['class' => 'btn-group mr-2'],
    'exportConfig' => [
        GridView::EXCEL => [
            'label' => 'Save as EXCEL',
            'iconOptions' => ['class' => 'text-success'],
            'showHeader' => true,
            'showPageSummary' => true,
            'showFooter' => true,
            'showCaption' => true,
            'filename' => 'Approval-Asset',
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
            'filename' => 'Approval-Asset',
            'alertMsg' => 'Export Data to CSV.',
            'options' => ['title' => 'Comma Separated Values'],
            'mime' => 'application/csv',
            'config' => [
                'colDelimiter' => ",",
                'rowDelimiter' => "\r\n",
            ],
        ],
    ],
    'columns' => $gridColumns, // check the configuration for grid columns by clicking button above
    'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
    'headerRowOptions' => ['class' => 'kartik-sheet-style'],
    'filterRowOptions' => ['class' => 'kartik-sheet-style'],
    'pjax' => true,
    'toolbar' => [
        [
            'options' => ['class' => 'btn-group mr-2']
        ],
        '{export}',
        '{toggleData}',
    ],
    'toggleDataContainer' => ['class' => 'btn-group mr-2'],
    'export' => [
        'fontAwesome' => true
    ],
]); ?>

<?php ActiveForm::end(); ?>
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="editlabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="editlabel"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    Edit Data</h4>
            </div>
            <?php $form = ActiveForm::begin([
                'method' => 'post',
                'action' => ['update-device'],
            ]);
            ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="id_asset_master_request"
                           name="id_asset_master_request">
                </div>
                <div class="form-group">
                    <label>Request By</label>
                    <input type="text" class="form-control" id="requested_by" name="requested_by">
                </div>
                <div class="form-group">
                    <label>Request notes</label>
                    <input type="textarea" class="form-control" id="request_notes" name="request_notes">
                </div>
                <div class="form-group">
                    <label>Approval Status</label>
                    <?php
                    $listStatus = \app\common\labeling\ApprovalLabel::getApprovalCode();

                    echo $form->field($model, 'approved_status')->dropDownList($listStatus, ['id' => 'approved_status', 'name'=>'approved_status'])->label(false); ?>

                    <?php /*echo $form->field($model, 'approved_status')->widget(Select2::classname(), [
                        'data' => $listStatus,
                        'id' => 'approved_status',
                        'options' => ['placeholder' => 'Pilih Status'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label(false); */ ?>

                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="update" class="btn btn-primary" data-loading-text="Loading..."
                        onautocomplete="off">Update
                </button>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
