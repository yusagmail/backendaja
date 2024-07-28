<?php

use backend\models\AppFieldConfigSearch;
use backend\models\Location;

//use yii\widgets\ActiveForm;
//use yii\widgets\ActiveForm;
// use backend\models\Sensor;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-item-form">
    <?php
    $listElements = AppFieldConfigSearch::getListFormElement(Location::tableName(), $form, $model);

    foreach($listElements as $formdis){
        echo $formdis;
    }
    ?>

</div>
