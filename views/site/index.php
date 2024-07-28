<?php

/* @var $this yii\web\View */
use backend\models\AppSettingSearch;
$appName = AppSettingSearch::getValueByKey("APP-NAME-SINGKAT");
$imgdefault = '@web/images/home.jpg';
$backimage = AppSettingSearch::getImageUrl("MAIN-BACKGROUND", $imgdefault);

$this->title = $appName;

?>
<style>
    .img-responsive {
        position: relative;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
    }

</style>
<div class="site-index">

    <div class="box">
        <div class="box-header with-border">
            <?php /*
            <h3 class="box-title"><?= Yii::$app->name ?> (<?= date('F Y') ?>)
            </h3>
            */ ?>
        </div>
        <div class="box-body">
            <img class="img-responsive" src="<?php echo Yii::$app->request->baseUrl . $backimage; ?>"/>

        </div>
    </div>

</div>
