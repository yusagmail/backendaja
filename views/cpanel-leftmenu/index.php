<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CpanelLeftmenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu Auth Aplikasi';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
    $listRole = \backend\models\User::getActiveListRoleLevel();
?>

<div class="box">
    <div class="box-body material-finish-index">
    <?php /*
    <div class="box-header with-border">
        <?= Html::a('Tambah Menu', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    */ ?>
        <div class="table-responsive no-padding">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
          <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'options' => ['style' => ['font-size'=>'12px']],
                //'filterModel' => $searchModel,
                'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-edit"></span> ' . $this->title],
                'export' => [
                    'label' => 'Export',
                ],
                'tableOptions' => ['class' => 'table tblSec'],
                 'rowOptions' => function ($model, $index, $widget, $grid){

                      if($model->id_parent_leftmenu == 0){
                        return ['class' => 'danger'];
                      }else{
                        return [];
                      }
                    },
                'pager' => [
                    'firstPageLabel' => 'First',
                    'lastPageLabel'  => 'Last'
                ],
                'exportConfig' => [
                    GridView::EXCEL => [
                        'label' => 'Save as EXCEL',
                        'iconOptions' => ['class' => 'text-success'],
                        'showHeader' => true,
                        'showPageSummary' => true,
                        'showFooter' => true,
                        'showCaption' => true,
                        'filename' => 'Data ' . $this->title,
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
                        'filename' => 'Data CSV ' . $this->title,
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
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id_leftmenu',
                    
    //                'has_child',
                    'menu_name',
                    //'id_parent_leftmenu',
                    [
                        'label' => 'Menu Utama?',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if($data->id_parent_leftmenu == 0){
                                return "PARENT";
                            }else{
                                return "CHILD";
                            }
                        },

                    ],
                    //'menu_icon',
                    //'value_indo',
                    //'value_eng',
                    //'url:url',
    //                'is_public',
                    //'auth:ntext',
                    [
                        'label' => 'auth',
                        'format' => 'raw',
                        //'value' => function ($data) use ($ip) {
                        'value' => function ($data) use ($listRole){
                            return $data->getAuthAlias($listRole);
                        
                        }
                    ],
                    [
                        'label' => 'Update Auth',
                        'format' => 'raw',
                        //'value' => function ($data) use ($ip) {
                        'value' => function ($data) {
                            $i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_leftmenu);

                            $button = "";
                            $button .=  Html::a(
                                '<i class="fa fa-fw fa-pencil"></i> Update Auth',
                                ['update-auth', 'i' => $i],
                                ['class' => 'btn btn-success btn-xs btn-block']
                            );
                            return $button;
                        
                        }
                    ],
                    //d'mobile_display',
                    //'visible',

                    //['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
