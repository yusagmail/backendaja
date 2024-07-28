<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_item_tracking_log".
 *
 * @property int $id_asset_item_tracking_log
 * @property int $id_asset_item
 * @property int $id_device_tracking
 * @property string $log_date
 * @property string $log_datetime
 * @property string $device_logtime
 * @property string $longitude
 * @property string $latitude
 * @property string $full_message
 */
class AssetItemTrackingLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_item_tracking_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item', 'id_device_tracking', 'log_date', 'log_datetime', 'longitude', 'latitude'], 'required'],
            [['id_asset_item', 'id_device_tracking'], 'integer'],
            [['log_date', 'log_datetime', 'device_logtime'], 'safe'],
            [['longitude', 'latitude'], 'string', 'max' => 250],
            [['full_message'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_item_tracking_log' => 'Id Asset Item Tracking Log',
            'id_asset_item' => 'Id Asset Item',
            'id_device_tracking' => 'Id Device Tracking',
            'log_date' => 'Log Date',
            'log_datetime' => 'Log Datetime',
            'device_logtime' => 'Device Logtime',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'full_message' => 'Full Message',
        ];
    }

    public function getAssetMaster()
    {
        return $this->hasOne(AssetMaster::className(), ['id_asset_master' => 'id_asset_item']);
    }

    public function getDevice()
    {
        return $this->hasOne(AssetItemTrackingDevice::className(), ['id_asset_item_tracking_device'=>'id_device_tracking']);
    }
}
