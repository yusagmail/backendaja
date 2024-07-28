<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\MaterialFinish;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialInItemProcSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Join Packing';
?>
<div class="box">
    <div class="box-body material-in-item-proc-index">
    <div class="callout callout-info">
        <h4>Petunjuk</h4>

        <p>Untuk join packing silakan pilih potongan-potongan yang mau dijoin dengan memilih check list data-data tersebut.
    </p>
    </div>

<?php
/*
    echo Html::a('<i class="fa fa-plus"></i> Tambah Item', ['create-item', 'ip' => $ip], ['class' => 'btn btn-block btn-sm btn-success various fancybox.ajax', 'title' => 'Testing']);
*/
?>
<?php
$this->registerCssFile("@web/plugins/fancybox/jquery.fancybox.css", ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('@web/plugins/fancybox/jquery.fancybox.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<?php
$this->registerJs(
    '  
    $(".various").fancybox({
        maxWidth    : 800,
        maxHeight   : 700,
        fitToView   : false,
        // width        : "70%",
        // height       : "70%",
        autoSize    : true,
        closeClick  : false,
        openEffect  : "none",
        closeEffect : "none"
    });
        '
);
?>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

<?php

    function displayLabelYardHasil($idx, $data){
        $field = 'yard_hasil'.$idx;
        $field_id_packing = 'id_basic_packing'.$idx;
        $field_id_material_finish= 'id_material_finish'.$idx;
        $result = $data->$field;

        if($result > 0){
            if($data->$field_id_packing > 0){
 /*
               $matfinish =  MaterialFinish::find()
                    ->where(['id_material_in_item_proc' => $data->id_material_in_item_proc,
                         'no_splitting' => $idx,   
                        ])
                    ->one();
                */
                $matfinish =  MaterialFinish::find()
                    ->where(['id_material_finish' => $data->$field_id_material_finish, 
                        ])
                    ->one();
                if($matfinish != null){
                    if($matfinish->is_join_packing == 1){
                        $result .= '<Br>
                        <span class="label label-warning">'.$matfinish->no_urut_kode.' [JOIN]</span>
                        ';

                    }else{
                        $result .= '<Br>
                        <span class="label label-success">'.$matfinish->no_urut_kode.'</span>
                        ';
                    }
                }else{
                    $result .= '<Br>
                    <span class="label label-warning">Blm Generate</span>
                    ';
                }
               
            }else{
                $result .= '<Br>
                <span class="label label-danger">Blm pack</span>
                ';
                $result .= '<input type="checkbox" id="queue-order" name="join-check-'.$data->id_material_in_item_proc.'-'.$idx.'" value="1">Pilih';
            }
        }
        
        return $result;
    }
?>
    <?php $form = ActiveForm::begin([

    ]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'yard_awal',
                //'yard_hasil1',
                [
                    'attribute' => 'yard_hasil1',
                    'format' => 'raw',
                    'value' => function ($data) use ($ip) {
                        return displayLabelYardHasil(1, $data);
                    }
                ],
                [
                    'attribute' => 'yard_hasil2',
                    'format' => 'raw',
                    'value' => function ($data) use ($ip) {
                        return displayLabelYardHasil(2, $data);
                    }
                ],
                //'yard_hasil3',
                [
                    'attribute' => 'yard_hasil3',
                    'format' => 'raw',
                    'value' => function ($data) use ($ip) {
                        return displayLabelYardHasil(3, $data);
                    }
                ],
                [
                    'attribute' => 'yard_hasil4',
                    'format' => 'raw',
                    'value' => function ($data) use ($ip) {
                        return displayLabelYardHasil(4, $data);
                    }
                ],
                [
                    'attribute' => 'yard_hasil5',
                    'format' => 'raw',
                    'value' => function ($data) use ($ip) {
                        return displayLabelYardHasil(5, $data);
                    }
                ],
                [
                    'attribute' => 'yard_hasil6',
                    'format' => 'raw',
                    'value' => function ($data) use ($ip) {
                        return displayLabelYardHasil(6, $data);
                    }
                ],
                //'yard_hasil2',
                /*
                'yard_hasil3',
                'yard_hasil4',
                'yard_hasil5',
                'yard_hasil6',
                */
                //'yard_hasil_total',
                [
                    'attribute' => 'buang1',
                    'label' => 'BS1',
                ],
                [
                    'attribute' => 'buang2',
                    'label' => 'BS2',
                ],

                /*
                'selisih_lebih',
                'selisih_kurang',
                */
                /*
                [
                    'attribute' => 'is_packing',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if ($data->is_packing == 1) {
                            //return "SUDAH PACKING";
                            return '<span class="label label-success" >SUDAH PACKING</span>';
                        } else {
                            //return "BELUM PACKING";
                            return '<span class="label label-danger" >BELUM PACKING</span>';
                        }
                    },
                ],
                [
                    'attribute' => 'id_basic_packing',
                    'format' => 'raw',
                    'label' => 'Basic Packing',
                    'value' => function ($data) {
                        if (isset($data->basicPacking)) {
                            return $data->basicPacking->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                */
                //'created_date',
                //'created_ip_address',

                /*
                [
                    'label' => 'Packing',
                    'format' => 'raw',
                    'value' => function ($data) use ($ip) {
                        //$ic = EncryptionDB::staticEncryptor('encrypt', $data->id_pelanggaran);
                        return Html::a(
                            '<i class="fa fa-fw fa-barcode"></i> Packing',
                            ['material-in/update-packing', 'id_item' => $data->id_material_in_item_proc, 'id_parent' => $ip],
                            ['class' => 'btn btn-info btn-xs']
                        );
                    }
                ],
                [
                    'label' => 'Edit',
                    'format' => 'raw',
                    'value' => function ($data) use ($ip) {
                        //$ic = EncryptionDB::staticEncryptor('encrypt', $data->id_pelanggaran);
                        return Html::a(
                            '<i class="fa fa-fw fa-pencil"></i>',
                            ['material-in/update-item', 'id_item' => $data->id_material_in_item_proc, 'id_parent' => $ip],
                            ['class' => 'btn btn-warning btn-xs']
                        );
                    }
                ],
                [
                    'label' => 'Del',
                    'format' => 'raw',

                    'value' => function ($data) use ($ip) {
                        //$ic = EncryptionDB::staticEncryptor('encrypt', $data->id_pelanggaran);
                        return Html::a(
                            '<i class="fa fa-fw fa-trash"></i>',
                            ['material-in/delete-item', 'id_item' => $data->id_material_in_item_proc, 'id_parent' => $ip],
                            ['class' => 'btn btn-danger btn-xs']
                        );
                    }
                ],
                /*
                [
                    'label' => 'View',
                    'format' => 'raw',

                    'value' => function ($data) use ($ip) {
                        //$ic = EncryptionDB::staticEncryptor('encrypt', $data->id_pelanggaran);
                        return Html::a(
                            '<i class="fa fa-fw fa-eye"></i>',
                            ['material-in/view-item', 'id_item' => $data->id_material_in_item_proc, 'id_parent' => $ip],
                            ['class' => 'btn btn-success btn-xs']
                        );
                    }
                ],

                */
                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

        <?php
        $listBackingPacking = \yii\helpers\ArrayHelper::map(\backend\models\BasicPacking::find()->orderBy([
            'nama' => SORT_ASC
        ])->asArray()->all(), 'id_basic_packing', 'nama');
        ?>

        <?php
            //Pinjem model aja biar lebih mudah
            $models = $dataProvider->getModels();
            $statusSaveToMaterialFinish = false;
            $matfinish_id_material_finish = 0;
            foreach ($models as $model) {
                break;
            }
        ?>

        <?= $form->field($model, 'id_basic_packing')->dropDownList(
            $listBackingPacking,
            //['prompt' => 'Pilih Basic Packing ...']
        ); ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>

