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
    $this->title = "Display QR CODE";
?>

<body>
    <div class="box box-body" >
        <div id='DivIdToPrint'>
        <center>
            <?php 
            $namaasset = $model->assetMaster->asset_name;
            $kodeasset = $model->number2;
            ?>
            <h1 style="font-size:14px; border: 0px"><?= $namaasset ?></h1>
            <h1 style="font-size:14px; border: 0px"><?= $kodeasset ?></h1>
            <?php

            use Da\QrCode\QrCode;

            $qrCode = (new QrCode('Manajemen Aset IndiHome'))
                ->setSize(250)
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