<?php
//$imgpath = "images/logo-main.png";
//<img class="img-responsive" width="400px" src="<?php echo Yii::$app->request->baseUrl . '/' . $imgpath;  />
$nama_perusahaan = \backend\models\AppSettingSearch::getValueByKey("APP-NAME");
?>
<table width="100%" style="margin: 5px;">
    <tr>

        <td>
            <table width="100%" border="0">
                <td class="title" width="10%">
                    <img src="<?= Yii::$app->request->baseUrl; ?>../../frontend/web/img/LOGO.jpg" style="width: 100%; max-width: 80px" />
                </td>
                <td style="text-align:left; vertical-align: top">
                    <div style="font-size:18px"><?= $nama_perusahaan ?></div>
                    <?php //= $model->outletPenjualan->alamat ?>
                </td>
            </table>

        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align: center; font-size: 18px; font-weight: bold; margin-right: 10px">
                SURAT JALAN
                <div style="font-size:12px">No. <?= $model->suratJalanNumber ?></div>
            </div>

        </td>
    </tr>
</table>