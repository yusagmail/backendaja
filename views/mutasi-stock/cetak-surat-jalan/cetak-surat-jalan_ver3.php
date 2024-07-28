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
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            font-size: 18px;
             font-weight: bold;
        }

        body,
        p {
            padding-right: 6px;
        }

        table {
            border-collapse: collapse;
            font-size: 12px;
            font-weight: bold;
        }

        td,
        th {
            padding: 4px 2px;
        }

        table tr th {
            background-color: #3c8dbc;
            color: #000;
            -webkit-print-color-adjust: exact;
        }

        table tr.item td {
            border: 1px solid #000;
        }

        #grid-pembayaran tr th {
            background-color: #b5b5b5;
            -webkit-print-color-adjust: exact;
            color: #000;
        }
    </style>
</head>

<body onload="javascript:window.print()">
    <?= $this->render('_header', [
        'modelParent' => $modelParent,
    ]) ?>
<table width="100%" >
    <tr><td>
        <table style="" width="90%">
        <tr>
            <td width="40%">Tgl Mutasi
            </td>
            <td width="10%">
                :
            </td>
            <td width="50%" style="margin-left: 60px">
                <?= common\helpers\Timeanddate::getShortDateIndo($modelParent->tanggal_mutasi) ?>
            </td>
        </tr>
        <tr>
            <td width="40%">Gudang Asal
            </td>
            <td width="10%">
                :
            </td>
            <td width="50%" style="margin-left: 60px">
                <?php
                if (isset($modelParent->gudangAsal)) {
                    echo $modelParent->gudangAsal->nama_gudang;
                } else {
                    echo "--";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td width="40%">Gudang Tujuan
            </td>
            <td width="10%">
                :
            </td>
            <td width="50%" style="margin-left: 60px">
                <?php
                if (isset($modelParent->gudangTujuan)) {
                    echo $modelParent->gudangTujuan->nama_gudang;
                } else {
                    echo "--";
                }
                ?>
            </td>
        </tr>
        </table>
    </td>
    <td>
        <table style="" width="90%">
            <tr>
                <td width="40%">Pemberi Perintah
                </td>
                <td width="10%">
                    :
                </td>
                <td width="50%" style="margin-left: 60px">
                    <?php
                    if (isset($modelParent->pemberiPerintah)) {
                        echo $modelParent->pemberiPerintah->nama_lengkap;
                    } else {
                        echo "--";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td width="40%">Pelaksana Perintah
                </td>
                <td width="10%">
                    :
                </td>
                <td width="50%" style="margin-left: 60px">
                    <?php
                    if (isset($modelParent->pelaksanaPerintah)) {
                        echo $modelParent->pelaksanaPerintah->nama_lengkap;
                    } else {
                        echo "--";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td width="40%"> Keterangan
                </td>
                <td width="10%">
                    :
                </td>
                <td width="50%" style="margin-left: 60px">
                    <?= $modelParent->keterangan ?>
                </td>
            </tr>
        </table>
    </td>
</tr>   
</table>

    <center>
        <table  width="100%" border="1">
            <tr class="item">
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
            $total_roll = 0;

            foreach ($models as $data) {
                $no++;
                if (isset($data->materialFinish)) {
                    $kode = $data->materialFinish->kode;
                } else {
                    $kode = "--";
                }

                if (isset($data->materialFinish->mater)) {
                    $material = $data->materialFinish->mater->nama;
                } else {
                    $material = "--";
                }

                if (isset($data->materialFinish->materialKategori1)) {
                    $warna = $data->materialFinish->materialKategori1->nama;
                } else {
                    $warna = "--";
                }

                if (isset($data->materialFinish->materialKategori2)) {
                    $jenis = $data->materialFinish->materialKategori2->nama;
                } else {
                    $jenis = "--";
                }

                if (isset($data->materialFinish->materialKategori3)) {
                    $motif = $data->materialFinish->materialKategori3->nama;
                } else {
                    $motif = "--";
                }

                if (isset($data->materialFinish)) {
                    if ($data->materialFinish->is_join_packing) {
                        $yard = $data->materialFinish->yard . '[' . $data->materialFinish->join_info . "]";
                    } else {
                        $yard = $data->materialFinish->yard;
                    }
                } else {
                    $yard = "--";
                }

                if (isset($data->materialFinish)) {
                    if ($data->materialFinish->is_join_packing) {
                        //$total_yard += $data->materialFinish->yard . '[' . $data->materialFinish->join_info . "]";
                        $total_yard += $data->materialFinish->yard;
                        $total_roll += 1;
                    } else {
                        $total_yard += $data->materialFinish->yard;
                        $total_roll += 1;
                    }
                } else {
                    $yard = "--";
                }

                echo '
                <tr class="item">
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
            <tr class="item">
                <td colspan="2">
                    <center><strong>Total Roll</strong></center>
                </td>
                <td colspan="2"><?= $total_roll ?></td>
                <td colspan="2">
                    <center><strong>Total Yard</strong></center>
                </td>
                <td><?= $total_yard ?></td>
                <td colspan="2">&nbsp;</td>
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
                    <h2><?php /**  $no */ ?></h2>
                </td>
            </tr>
        </table>
    </center> -->
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
    <?php
    /*
    = $this->render('_footer', [
        'modelParent' => $modelParent,
    ])
    */
     ?>
</body>

</html>