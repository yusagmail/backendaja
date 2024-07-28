<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_item_repair".
 *
 * @property int $id_asset_item_repair
 * @property int $id_asset_item
 * @property int $id_asset_item_incident
 * @property string $repair_date
 * @property int $id_vendor
 * @property string $carried_to_vendor_by
 * @property int $estimated_day
 * @property int $status_repair
 * @property string $repair_finish_date
 * @property double $repair_cost
 * @property string $received_date
 * @property string $received_user
 * @property string $repair_info
 * @property string $sparepart_changes_info
 * @property string $last_condition_report
 */
class AssetItemRepair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_item_repair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item', 'repair_date', 'estimated_day', 'status_repair', 'repair_finish_date', 'repair_info'], 'required'],
            [['id_asset_item', 'id_asset_item_incident', 'id_vendor', 'estimated_day', 'status_repair'], 'integer'],
            [['repair_date', 'repair_finish_date', 'received_date'], 'safe'],
            [['repair_cost'], 'number'],
            [['carried_to_vendor_by', 'received_user', 'repair_info', 'sparepart_changes_info', 'last_condition_report'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_item_repair' => 'Id Asset Item Repair',
            'id_asset_item' => 'Id Asset Item',
            'id_asset_item_incident' => 'Id Asset Item Incident',
            'repair_date' => 'Repair Date',
            'id_vendor' => 'Id Vendor',
            'carried_to_vendor_by' => 'Carried To Vendor By',
            'estimated_day' => 'Estimated Day',
            'status_repair' => 'Status Repair',
            'repair_finish_date' => 'Repair Finish Date',
            'repair_cost' => 'Repair Cost',
            'received_date' => 'Received Date',
            'received_user' => 'Received User',
            'repair_info' => 'Repair Info',
            'sparepart_changes_info' => 'Sparepart Changes Info',
            'last_condition_report' => 'Last Condition Report',
        ];
    }
    public function getAssetMaster()
    {
        return $this->hasOne(AssetMaster::className(), ['id_asset_master' => 'id_asset_item']);
    }
    public function getVendor()
    {
        return $this->hasOne(Vendor::className(), ['id_vendor' => 'id_vendor']);
    }
    public function getAssetItem()
    {
        //return $this->id_asset_item = $this->assetMaster->id_asset_item;
        return $this->hasOne(AssetItem::className(), ['id_asset_item' => 'id_asset_item']);
    }
}
