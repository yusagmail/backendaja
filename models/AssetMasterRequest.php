<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_master_request".
 *
 * @property int $id_asset_master_request
 * @property int $id_asset_master
 * @property string $request_date
 * @property int $quantity
 * @property string $request_datetime
 * @property string $request_notes
 * @property string $requested_by
 * @property int $requested_user_id
 * @property int $approved_status
 * @property string $requested_ip_address
 */
class AssetMasterRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_master_request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_master', 'request_date','quantity'], 'required'],
            [['id_asset_master', 'requested_user_id','approved_status'], 'integer'],
            [['request_date', 'request_datetime'], 'safe'],
            [['request_notes'], 'string'],
            [['quantity'], 'number'],

            [['requested_by', 'requested_ip_address'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_master_request' => 'Id Asset Master Request',
            'id_asset_master' => 'Id Asset Master',
            'request_date' => 'Request Date',
            'quantity' => 'Quantity',
            'request_datetime' => 'Request Datetime',
            'request_notes' => 'Request Notes',
            'requested_by' => 'Requested By',
            'approved_status' => 'Approval Status',
            'requested_user_id' => 'Requested User ID',
            'requested_ip_address' => 'Requested Ip Address',
        ];
    }
    public function getAssetMaster()
    {
        return $this->hasOne(AssetMaster::className(), ['id_asset_master' => 'id_asset_master']);
    }
    public function getProfileCompany(){
        return $this->id_asset_master = $this->assetMaster->id_asset_master;
    }
}
