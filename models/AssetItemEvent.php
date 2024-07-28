<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_item_event".
 *
 * @property int $id_asset_item_event
 * @property int $id_asset_item
 * @property string $event_date
 * @property string $start_time
 * @property string $end_time
 * @property string $event_name
 * @property string $description
 * @property string $pic
 * @property string|null $pic_phone
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class AssetItemEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_item_event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item', 'event_date', 'start_time', 'end_time', 'event_name', 'description', 'pic'], 'required'],
            [['id_asset_item', 'created_id_user'], 'integer'],
            [['event_date', 'start_time', 'end_time', 'created_date'], 'safe'],
            [['event_name', 'description', 'pic', 'pic_phone'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_item_event' => 'Id Asset Item Event',
            'id_asset_item' => 'Id Asset Item',
            'event_date' => 'Event Date',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'event_name' => 'Event Name',
            'description' => 'Description',
            'pic' => 'Pic',
            'pic_phone' => 'Pic Phone',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
