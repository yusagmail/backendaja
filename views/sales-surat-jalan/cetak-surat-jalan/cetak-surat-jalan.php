<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model backend\models\NilaiPlo */

//$this->title = $model->id_nilai_plo;
$this->title = 'SKPI';
$this->params['breadcrumbs'][] = ['label' => 'Nilai Plo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<head>
    <title></title>
    <style>
        html,
        body,
        p {
            margin: 0;
            padding: 0;
            /*
            font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif!important; */
            font-size: 18px;
        }

        body,
        p {
            padding-right: 6px;
        }

        table {
            border-collapse: collapse;
            font-size: 12px;
        }

        td,
        th {
            padding: 4px 2px;
        }

        table tr th {
            background-color: #3c8dbc;
            color: white;
            -webkit-print-color-adjust: exact;
        }

        #grid-pembayaran tr th {
            background-color: #b5b5b5;
            -webkit-print-color-adjust: exact;
        }
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Pacifico');
    </style>
</head>

<body onload="javascript:window.print()">
    <?= $this->render('_header', [
        'modelParent' => $modelParent,
    ]) ?>
    <table style="margin: 20px;" width="50%">
        <tr>
            <td width="40%">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tanggal Order
            </td>
            <td width="10%">
                :
            </td>
            <td width="50%" style="margin-left: 60px">
                <?= common\helpers\Timeanddate::getShortDateIndo($modelParent->tanggal_order) ?>
            </td>
        </tr>
        <tr>
            <td width="40%">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Outlet
            </td>
            <td width="10%">
                :
            </td>
            <td width="50%" style="margin-left: 60px">
                <?php
                if (isset($modelParent->outletPenjualan)) {
                    echo $modelParent->outletPenjualan->nama_outlet;
                } else {
                    echo "--";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td width="40%">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No. Order
            </td>
            <td width="10%">
                :
            </td>
            <td width="50%" style="margin-left: 60px">
                <?php
                if (isset($modelParent->nomor_sales_order)) {
                    echo $modelParent->nomor_sales_order;
                } else {
                    echo "--";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td width="40%">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Customer
            </td>
            <td width="10%">
                :
            </td>
            <td width="50%" style="margin-left: 60px">
                <?php
                if (isset($modelParent->customer)) {
                    echo $modelParent->customer->nama_customer;
                } else {
                    echo "--";
                }
                ?>
            </td>
        </tr>

    </table>
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Detail Barang
    <br>
    <center>
        <table style="margin: 10px;" width="90%" border="1">
            <tr>
                <td>No</td>
                <td>Kode</td>
                <td>Material</td>
                <td>Warna</td>
                <td>Jenis</td>
                <td>Motif</td>
                <td>Yard</td>
                <td width="1%">Ceklist Keluar</td>
                <td width="1%">Ceklist Terima</td>
            </tr>
            <?php
            $models = $dataProvider->getModels();
            $no = 0;
            $total_yard = 0;

            foreach ($models as $data) {
                $no++;
                if (isset($data)) {
                    $kode = $data->kode;
                } else {
                    $kode = "--";
                }

                if (isset($data->mater)) {
                    $material = $data->mater->nama;
                } else {
                    $material = "--";
                }

                if (isset($data->materialKategori1)) {
                    $warna = $data->materialKategori1->nama;
                } else {
                    $warna = "--";
                }

                if (isset($data->materialKategori2)) {
                    $jenis = $data->materialKategori2->nama;
                } else {
                    $jenis = "--";
                }

                if (isset($data->materialKategori3)) {
                    $motif = $data->materialKategori3->nama;
                } else {
                    $motif = "--";
                }

                if (isset($data)) {
                    if ($data->is_join_packing) {
                        $yard = $data->yard;
                    } else {
                        $yard = $data->yard;
                    }
                } else {
                    $yard = "--";
                }

                if (isset($data)) {
                    if ($data->is_join_packing) {
                        $total_yard += $data->yard;
                    } else {
                        $total_yard += $data->yard;
                    }
                } else {
                    $yard = "--";
                }

                echo '
                <tr>
                    <td>' . $no . '</td>
                    <td>' . $kode . '</td>
                    <td>' . $material . '</td>
                    <td>' . $warna . '</td>
                    <td>' . $jenis . '</td>
                    <td>' . $motif . '</td>
                    <td>' . $yard . '</td>
                    <td></td>
                    <td></td>
                </tr>
                ';
            }

            ?>
            <tr>
                <td colspan="6">
                    <center><strong>Total Yard</strong></center>
                </td>
                <td><?= $total_yard ?></td>
            </tr>
        </table>
    </center>

    <!-- <center>
        <table style="margin: 10px;" border="0" align="left">
            <tr>
                <td>
                    <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Yard</h2>
                </td>
                <td width="10%"></td>
                <td width="15%">
                    <h2>=</h2>
                </td>
                <td>
                    <h2><?php /* $total_yard */ ?></h2>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Roll</h2>
                </td>
                <td width="10%"></td>
                <td width="15%">
                    <h2>=</h2>
                </td>
                <td>
                    <h2><?php /* $no */ ?></h2>
                </td>
            </tr>
        </table>
    </center> -->
    <br><br><br><br><br><br>

    <!-- <hr> -->
    <table style="margin: 20px;" width="90%">
        <tr>
            <td align="center">
                Yang Menyerahkan,
                <br><br><br><Br><br>(
                <?php
                if (isset($modelParent->pemberiPerintah)) {
                    echo $modelParent->pemberiPerintah->nama_lengkap;
                } else {
                    echo " -- ";
                }
                ?>)
            </td>

            <!-- <td width="40%"> -->

            </td>
            <td align="center">
                Yang Menerima,
                <br><br><br><Br><br>(
                <?php
                if (isset($modelParent->pelaksanaPerintah)) {
                    echo $modelParent->pelaksanaPerintah->nama_lengkap;
                } else {
                    echo " -- ";
                }
                ?>
                )
            </td>
        </tr>
    </table>
    <br>
    <?= $this->render('_footer', [
        'modelParent' => $modelParent,
    ]) ?>
</body>

</html>