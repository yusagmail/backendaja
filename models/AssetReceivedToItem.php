<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_received_to_item".
 *
 * @property int $id_asset_received_to_item
 * @property int $id_asset_received
 * @property int $id_asset_item
 * @property int $created_user
 * @property string $created_date
 * @property string $created_ip_address
 */
class AssetReceivedToItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_received_to_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_received', 'id_asset_item'], 'required'],
            [['id_asset_received', 'id_asset_item', 'created_user'], 'integer'],
            [['created_date'], 'safe'],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_received_to_item' => 'Id Asset Received To Item',
            'id_asset_received' => 'Id Asset Received',
            'id_asset_item' => 'Id Asset Item',
            'created_user' => 'Created User',
            'created_date' => 'Created Date',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
