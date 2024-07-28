<?php

use common\labeling\CommonActionLabelEnum;
use common\utils\EncryptionDB;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemRepair */

$this->title = 'Detail Asset item Repair';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Repairs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-header box box-primary asset-item-incident-view">

    <div class="box-header with-border">

        <?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a(CommonActionLabelEnum::UPDATE, ['update', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_item_repair)], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(CommonActionLabelEnum::DELETE, ['delete', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_item_repair)], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => CommonActionLabelEnum::CONFIRM_DELETE,
                'method' => 'post',
            ],
        ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
//            'id_asset_item_repair',
                'assetMaster.asset_name',
                'id_asset_item_incident',
                'repair_date',
                'id_vendor',
                'carried_to_vendor_by',
                'estimated_day',
                'status_repair',
                'repair_finish_date',
                'repair_cost',
                'received_date',
                'received_user',
                'repair_info',
                'sparepart_changes_info',
                'last_condition_report',
            ],
        ]) ?>

    </div>
