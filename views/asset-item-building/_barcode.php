<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-body" style="">
    <h2><?= isset($model->assetMaster) ? $model->assetMaster->asset_name : "Untitled Room" ?></h2>
    <h4><?= $model->number1 ?></h2>

        <center>
            <?php

            use Da\QrCode\QrCode;
            $c = \common\utils\EncryptionDB::encryptor("encrypt", $model->id_asset_item);
            $kodeQR = "Asset-".$c;
            $qrCode = (new QrCode($kodeQR))
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
