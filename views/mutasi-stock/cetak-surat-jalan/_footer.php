<?php
use backend\models\AppSettingSearch;
$appname = AppSettingSearch::getValueByKey("APP-NAME");
$email = AppSettingSearch::getValueByKey("EMAIL");
$telp = AppSettingSearch::getValueByKey("WA-1");
$IG = AppSettingSearch::getValueByKey("IG");
$address = AppSettingSearch::getValueByKey("ADDRESS");
$aboutweb = AppSettingSearch::getValueByKey("ABOUT-WEB");
?>
<div style="text-align: center; font-size: 8px; font-weight: bold; margin-top: 20px">
    <?= $appname ?><Br>
    Email : <?= $email ?>
    <?php /*
    <br><Br>
    WA : <?= $telp ?> - INSTAGRAM : <?= $IG ?>
    */ ?>
</div>