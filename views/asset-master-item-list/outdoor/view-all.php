<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem */

\yii\web\YiiAsset::register($this);
$labelHead = \backend\models\AppVocabularySearch::getValueByKey('Asset Item');
?>
<div class="asset-item-view box box-primary">
    <div class="box box-body">
        <div class="box-body">
            <div class="box-tools pull-right">
            <?php           
                echo Html::a(
                  '<i class="fa fa-arrow-circle-left"></i> Kembali',
                  ['asset-master-item/view-stock', 'i' => $i, 't' => $t, 'action' => 'index'],
                  ['class' => 'btn btn-warning btn-sm']
              );
            ?>  
            <?php    
                $idi = \common\utils\EncryptionDB::encryptor('encrypt',$model->id_asset_item);       
                echo Html::a(
                  '<i class="fa fa-pencil"></i> Ubah',
                  ['asset-master-item/view-stock', 'i' => $i, 't' => $t, 'idi'=>$idi,  'action' => 'update'],
                  ['class' => 'btn btn-info btn-sm']
              );
            ?>          
            </div>
        </div>
        <?= $this->render('generated-code/_view_qr_code', [
            'model' => $model,
        ]) ?>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id_asset_item',
                //'id_asset_master',
                'number1',
                /*
                'number2',
                'number3',
                'picture1',
                'picture2',
                'picture3',
                'id_asset_received',
                'id_asset_item_location',
                */
            ],
        ]) ?>

        <div class="box-footer">
            <div class="form-group">
                <h4 class="box-title text-success">Penerimaan <?= $labelHead ?></h4>
                <?php 
                $modelview = \backend\models\AssetReceived::find()
                    ->where(['id_asset_item' => $model->id_asset_item])
                    ->one();
                if($modelview != null){
                    echo $this->render('_view_asset_item_received', [
                        'model' => $modelview,
                    ]);
                }
            ?>
            </div>
        </div>

        <div class="box-footer">
            <div class="form-group">
                <h4 class="box-title text-danger">Penempatan <?= $labelHead ?></h4>
                <?php 
                $modelview = \backend\models\AssetItemMapping::find()
                    ->where(['id_asset_item' => $model->id_asset_item])
                    ->one();
                if($modelview != null){
                    echo $this->render('_view_asset_item_location', [
                        'model' => $modelview,
                    ]);
                }
            ?>
            </div>
        </div>
    </div>
</div>
