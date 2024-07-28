<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMaster */

$this->title = AppVocabularySearch::getValueByKey('List').' '. AppVocabularySearch::getValueByKey('Asset Item By Master');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey('Asset Master'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::DETAIL.' '. AppVocabularySearch::getValueByKey('Asset Master'), 'url' => ['view', 'id' => $model->id_asset_master]];
$this->params['breadcrumbs'][] = AppVocabularySearch::getValueByKey('Stock');

?>
<div class="asset-master-update">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_view_short', [
        'model' => $model,
    ]) ?>
    <?php 

    $searchModel = new \backend\models\AssetItemSearch();
    $searchModel->id_asset_master = $model->id_asset_master;
    $dataProvider = $searchModel->searchSimple(Yii::$app->request->queryParams);
        
    echo $this->render('/asset-master-item-list/_inner_view_controller', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'model' => $model,
        'i' => $i,
        'action' =>$action,
        'idi' => $idi,
        't'=>$t
    ]);
    ?>
</div>
