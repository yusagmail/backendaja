<?php

use yii\helpers\Html;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<?php
    $this->title = "Cetak Barcode Number";

    $field = "yard_hasil".$label;
    $labelbarcode = "label_barcode_number".$label;
    $ukuran = $model->$field;
    $barcodeNumber = $model->$labelbarcode;

    //Get Nama Kain
    $namaMaterial = "-- NAMA TIDAK ADA --";
    if(isset($model->materialIn->mater)){
        $namaMaterial = $model->materialIn->mater->nama;
        $namaMaterial .= " - ".$model->materialIn->varian;
    }
?>

<body>
    <div class="box box-body" id='DivIdToPrint'>
        <center>
            <table>
                <h1><?= $namaMaterial ?></h1>
                <div id="showBarcode"></div>


                <?php
                $label = "Muhammad Fajri";

                use barcode\barcode\BarcodeGenerator as BarcodeGenerator;

                $optionsArray = array(
                    'elementId' => 'showBarcode', /* div or canvas id*/
                    'value' => $barcodeNumber, /* value for EAN 13 be careful to set right values for each barcode type */
                    'type' => 'code128',/*supported types  ean8, ean13, upc, std25, int25, code11, code39, code93, code128, codabar, msi, datamatrix*/
                );

                echo BarcodeGenerator::widget($optionsArray);
                ?>
                <h3><?= $ukuran ?> Yard | PT.Domivatex</h3>
                <?php /* Html::a(
                    '<i class="fa fa-print"></i>',
                    ['material-in/generate-barcode', 'id_item' => $id_item, 'id_parent' => $id_parent],
                    ['class' => 'btn btn-success']
                ) */ ?>
                <input type='button' id='btn' value='Print' class="btn btn-success" onclick='printDiv();'>
            </table>
        </center>
    </div>
    <script>
        function printDiv() {
            var divToPrint = document.getElementById('DivIdToPrint');
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
            newWin.document.close();
            setTimeout(function() {
                newWin.close();
            }, 10);
        }
    </script>
</body>

</html>