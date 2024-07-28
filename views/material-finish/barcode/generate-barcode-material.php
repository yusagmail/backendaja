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

    $barcodeNumber = $model->barcode_kode;
    //$barcodeNumber = \common\helpers\BarcodeHelper::generateEAN($model->id_material_finish);
    
    /*
    $organizationNumber = Yii::$app->params['organization-kode'];
    $barcodeNumber = \common\helpers\BarcodeHelper::generateEANProductNumberVer-sudahdiganti2($model->id_material_finish, $organizationNumber);
    */
    $ukuran = $model->yard;
    //Get Nama Kain
    $namaMaterial = "-- NAMA TIDAK ADA --";
    if (isset($model->mater)) {
        $namaMaterial = $model->mater->nama;
        //$namaMaterial .= " - ".$model->materialIn->varian;
    }

/*
function generateEAN($number)
{
  $code = '200' . str_pad($number, 9, '0');
  $weightflag = true;
  $sum = 0;
  // Weight for a digit in the checksum is 3, 1, 3.. starting from the last digit. 
  // loop backwards to make the loop length-agnostic. The same basic functionality 
  // will work for codes of different lengths.
  for ($i = strlen($code) - 1; $i >= 0; $i--)
  {
    $sum += (int)$code[$i] * ($weightflag?3:1);
    $weightflag = !$weightflag;
  }
  $code .= (10 - ($sum % 10)) % 10;
  return $code;
}
*/
?>

<body>
    <div class="box box-body" >
        <div id='DivIdToPrint'>
        <center>
            <table>
                <h1 style="font-size:14px; border: 0px"><?= $namaMaterial ?></h1>
                <h1 style="font-size:14px; border: 0px"><?= $model->kode ?></h1>
                <div id="showBarcode"></div>


                <?php
                use barcode\barcode\BarcodeGenerator as BarcodeGenerator;

                $optionsArray = array(
                    'elementId' => 'showBarcode', /* div or canvas id*/
                    'value' => $barcodeNumber, /* value for EAN 13 be careful to set right values for each barcode type */
                    //'type' => 'code128',/*supported types  ean8, ean13, upc, std25, int25, code11, code39, code93, code128, codabar, msi, datamatrix*/
                    'type' => 'ean13',
                );

                echo BarcodeGenerator::widget($optionsArray);
                ?>
                <h3 style="font-size:14px; border: 0px"><?= $ukuran ?> Yard</h3>
                <?php /* Html::a(
                    '<i class="fa fa-print"></i>',
                    ['material-in/generate-barcode', 'id_item' => $id_item, 'id_parent' => $id_parent],
                    ['class' => 'btn btn-success']
                ) */ ?>
                
            </table>
        </center>
        </div>
        <input type='button' id='btn' value='Print' class="btn btn-success" onclick='printDiv();'>
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