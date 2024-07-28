<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
$basepath = Yii::$app->request->baseUrl;
?>

                <?= DetailView::widget([
                    'model' => $model,
                    
                    'attributes' => [
                        //'tanggal_order',
                        [
                            'attribute' => 'status_pembayaran',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return common\helpers\Timeanddate::getShortDateIndo($data->tanggal_order);
                            },

                        ],
                        [
                            'attribute' => 'bayar_total_bayar',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return \common\helpers\ContentStringManipulator::formatRp($data->bayar_total_bayar);
                            },

                        ],
                        //'bayar_total_bayar',
                        'bayar_tanggal_bayar',
                        //'bayar_id_bank_pembayaran',
                        [   
                            'attribute' => 'bayar_id_bank_pembayaran',
                            'format' => 'raw',
                            'value' => function ($data) {
                                if (isset($data->bankPembayaran)) {
                                    return $data->bankPembayaran->nama_bank." (".$data->bankPembayaran->nomor_rekening.")";
                                } else {
                                    return "--";
                                }
                            },

                        ],
                        'bayar_cara',
                        
                        /*
                        [   
                            'attribute' => 'id_customer',
                            'format' => 'raw',
                            'value' => function ($data) {
                                if (isset($data->customer)) {
                                    return $data->customer->nama_customer;
                                } else {
                                    return "--";
                                }
                            },
                            //'filter' => Html::activeDropDownList($searchModel, 'id_customer', $dataListCustomer, ['class' => 'form-control']),
                        ],
                        [   
                            'attribute' => 'id_outlet_penjualan',
                            'format' => 'raw',
                            'value' => function ($data) {
                                if (isset($data->outletPenjualan)) {
                                    return $data->outletPenjualan->nama_outlet;
                                } else {
                                    return "--";
                                }
                            },

                        ],
                        */
                        /*
                        'invoice_total',
                        'bayar_total_bayar',
                        'bayar_cara',
                        'bayar_uang_muka',
                        'bayar_bukti',
                        'status_order',
                        'created_date',
                        'created_ip_address',
                        */
                        //'bayar_bukti',
                        [
                            'attribute' => 'bayar_bukti',
                            'format' => 'raw',
                            'value' => function ($data) use ($basepath) {
                                $imgpath = $data->bayar_bukti;
                                if ($data->bayar_bukti != "") {
                                    //return '<img class="img-responsive" width="100px" src="' . $basepath . '/uploads/galery/' . $imgpath . '" alt="Foto"/>';
                                    return '<img src="'.$basepath.'/file/bayar_bukti/'.$imgpath.'" class="img-responsive" width="300px" alt="Foto"> ';
                                } else {
                                    return "No Image";
                                }
                            }
                        ],
                    ],
                ]) ?>
        <?php 
        /*
        $imgpath = $model->bayar_bukti;
        if ($model->bayar_bukti != "") {
            //echo '<img class="img-responsive"  src="' . $basepath . '/uploads/galery/' . $imgpath . '" alt="Foto"/>';
            echo '<img src="'.$basepath.'/file/bayar_bukti/'.$imgpath.'" class="img-responsive" alt="Foto"> ';
        } else {
            echo "Foto/file tidak ditemukan";
        }
        */
        ?>