<?php

use common\utils\EncryptionDB;
use backend\models\AssetItemLocation;
use backend\models\AssetMaster;
use backend\models\AssetReceived;
use backend\models\Kabupaten;
use backend\models\Kecamatan;
use backend\models\Kelurahan;
use backend\models\TypeAssetItem1;
use backend\models\TypeAssetItem2;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = 'Map Maker';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$models = $dataProviderDisplay->getModels();
?>
<div class="asset-item-list box box-success">
    <div class="row">
        <div class="col-md-9">
            <div class="box-body" style="">
                <?= $this->render('_map_sample', [
                    'models' => $models,
                ]) ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box-body" style="">
                Ini Nanti Buat Panelnya
            </div>
        </div>
    </div>
</div>
