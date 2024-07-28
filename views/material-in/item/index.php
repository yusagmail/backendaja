<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialInItemProcSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="box">
    <div class="box-body material-in-item-proc-index">


        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Tambah Item', ['create-item', 'ip' => $ip], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'yard_awal',
                'yard_hasil1',
                'yard_hasil2',
                'yard_hasil3',
                'yard_hasil4',
                'yard_hasil5',
                'yard_hasil6',
                //'yard_hasil_total',
                [
                    'attribute' => 'buang1',
                    'label' => 'BS1',
                ],
                [
                    'attribute' => 'buang2',
                    'label' => 'BS2',
                ],
                'selisih_lebih',
                'selisih_kurang',
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
                //'created_date',
                //'created_ip_address',

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
                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>