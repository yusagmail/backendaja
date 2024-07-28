<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_item_tracking_device".
 *
 * @property int $id_asset_item_tracking_device
 * @property int $id_asset_item
 * @property int $id_device
 * @property string $installed_date
 * @property string $installed_by
 * @property int $status_active
 * @property string $notes
 */
class AssetItemTrackingDevice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_item_tracking_device';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item', 'status_active', 'number_device'], 'required'],
            [['id_asset_item', 'id_device', 'status_active'], 'integer'],
            [['installed_date'], 'safe'],
            [['installed_by'], 'string', 'max' => 150],
            [['notes'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_item_tracking_device' => 'Id Asset Item Tracking Device',
            'id_asset_item' => 'Asset Item',
            'id_asset_master' => 'Asset Item',
            'number_device' => 'No ID Device',
            'id_device' => ' Device',
            'installed_date' => 'Installed Date',
            'installed_by' => 'Installed By',
            'status_active' => 'Status Active',
            'notes' => 'Notes',
        ];
    }

    public function getAssetMaster()
    {
        return $this->hasOne(AssetMaster::className(), ['id_asset_master' => 'id_asset_item']);
    }

    public function getAssetItem()
    {
        return $this->hasOne(AssetItem::className(), ['id_asset_item' => 'id_asset_item']);
    }
}
