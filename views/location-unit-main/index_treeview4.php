<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\LocationUnit;
use backend\models\Location;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LocationUnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CommonActionLabelEnum::LIST_ALL ." ". $mainLabel;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box">
    <div class="box-body type-asset1-index">
            <?= $this->render('_list_in_child', [
                //'model' => $model,
            ]) ?>
    </div> 
</div>