<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_item_maintenance".
 *
 * @property int $id_asset_item_maintenance
 * @property int $id_asset_item
 * @property int $id_asset_master_criteria_maintenance
 * @property double $last_primer_value
 * @property string $maintenance_date
 * @property int $id_vendor
 * @property string $carried_to_vendor_by
 * @property int $estimated_day
 * @property int $status_maintenance
 * @property string $maintenance_finish_date
 * @property double $maintenance_cost
 * @property string $received_date
 * @property string $received_user
 * @property string $maintenance_info
 * @property string $sparepart_changes_info
 * @property string $last_condition_report
 */
class AssetItemMaintenance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_item_maintenance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item', 'maintenance_date', 'estimated_day', 'status_maintenance', 'maintenance_finish_date', 'maintenance_info'], 'required'],
            [['id_asset_item', 'id_asset_master_criteria_maintenance', 'id_vendor', 'estimated_day', 'status_maintenance'], 'integer'],
            [['last_primer_value', 'maintenance_cost'], 'number'],
            [['maintenance_date', 'maintenance_finish_date', 'received_date'], 'safe'],
            [['carried_to_vendor_by', 'received_user', 'maintenance_info', 'sparepart_changes_info', 'last_condition_report'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_item_maintenance' => 'Id Asset Item Maintenance',
            'id_asset_item' => 'Id Asset Item',
            'id_asset_master_criteria_maintenance' => 'Id Asset Master Criteria Maintenance',
            'last_primer_value' => 'Last Primer Value',
            'maintenance_date' => 'Maintenance Date',
            'id_vendor' => 'Vendor',
            'carried_to_vendor_by' => 'Carried To Vendor By',
            'estimated_day' => 'Estimated Day',
            'status_maintenance' => 'Status Maintenance',
            'maintenance_finish_date' => 'Maintenance Finish Date',
            'maintenance_cost' => 'Maintenance Cost',
            'received_date' => 'Received Date',
            'received_user' => 'Received User',
            'maintenance_info' => 'Maintenance Info',
            'sparepart_changes_info' => 'Sparepart Changes Info',
            'last_condition_report' => 'Last Condition Report',
        ];
    }
    public function getAssetMaster()
    {
        return $this->hasOne(AssetMaster::className(), ['id_asset_master' => 'id_asset_item']);
    }
    public function getCriteria()
    {
        return $this->hasOne(AssetMasterCriteriaMaintenance::className(), ['id_asset_master_criteria_maintenance' => 'id_asset_master_criteria_maintenance']);
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
