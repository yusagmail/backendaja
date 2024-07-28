<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-body" style="text-align: center;">
    <div id='DivIdToPrint'>
        <center>


        <center>
            <?php

            use Da\QrCode\QrCode;
            $c = \common\utils\EncryptionDB::encryptor("encrypt", $model->id_asset_item);
            $kodeQR = "Asset-".$model->number1;
            $qrCode = (new QrCode($kodeQR))
                ->setSize(120)
                ->setMargin(5)
                ->useForegroundColor(0, 0, 0);
                //->useForegroundColor(51, 153, 255);


            // now we can display the qrcode in many ways
            // saving the result to a file:

            $qrCode->writeFile(__DIR__ . '/code.png'); // writer defaults to PNG when none is specified

            // display directly to the browser 
            // header('Content-Type: '.$qrCode->getContentType());
            // echo $qrCode->writeString();

            ?> 

            <?php 
            // or even as data:uri url
            echo '<img src="' . $qrCode->writeDataUri() . '">';
            ?>
        </center>
    </center>
    </div>
</div>
<input type='button' id='btn' value='Print' class="btn btn-success" onclick='printDiv();'>
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