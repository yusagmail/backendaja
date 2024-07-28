<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_dismantle_received".
 *
 * @property int $id_asset_dismantle_received
 * @property int $id_asset_dismantle_order
 * @property int $id_warehouse
 * @property string $received_date
 * @property string|null $notes
 * @property int $is_approved
 * @property int|null $approval_user_id
 * @property string|null $approval_date
 * @property string|null $approval_ip_address
 */
class AssetDismantleReceived extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_dismantle_received';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_dismantle_order',], 'required'],
            [['id_asset_dismantle_order', 'id_warehouse', 'is_approved', 'approval_user_id'], 'integer'],
            [['received_date', 'approval_date'], 'safe'],
            [['notes', 'approval_ip_address'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_dismantle_received' => 'Id Asset Dismantle Received',
            'id_asset_dismantle_order' => 'Id Asset Dismantle Order',
            'id_warehouse' => 'Nama Warehouse',
            'received_date' => 'Tanggal Pencabutan',
            'notes' => 'Notes',
            'is_approved' => 'Status Barang ',
            'approval_user_id' => 'Teknisi User ID',
            'approval_date' => 'Tgl. Diterima',
            'approval_ip_address' => 'Approval Ip Address',
        ];
    }
    public function getWarehouse()
    {
        return $this->hasOne(Warehouse::className(), ['id_warehouse' => 'id_warehouse']);
    }

    public function getUserApproval()
    {
        return $this->hasOne(User::className(), ['id' => 'approval_user_id']);
    }
}
