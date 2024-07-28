<?php

namespace backend\models;

use Yii;
use backend\models\AppVocabularySearch;


/**
 * This is the model class for table "asset_item_reservation".
 *
 * @property int $id_asset_item_reservation
 * @property int $id_asset_item
 * @property string $event_date
 * @property string $start_time
 * @property string $end_time
 * @property string $event_name
 * @property string $description
 * @property string $pic
 * @property string|null $reservation_time
 * @property string|null $reservation_name
 * @property int|null $reservation_id_user
 * @property string|null $reservation_ip_address
 * @property string|null $reservation_phone
 */
class AssetItemReservation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_item_reservation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item', 'event_date', 'start_time', 'end_time', 'event_name', 'pic'], 'required'],
            [['id_asset_item', 'reservation_id_user'], 'integer'],
            [['event_date', 'start_time', 'end_time', 'reservation_time'], 'safe'],
            [['event_name', 'description', 'pic', 'reservation_name', 'reservation_ip_address', 'reservation_phone'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_item_reservation' => 'Id Asset Item Reservation',
            'id_asset_item' => AppVocabularySearch::getValueByKey('Room'),
            'event_date' => 'Event Date',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'event_name' => 'Event Name',
            'description' => 'Description',
            'pic' => 'PIC / Contact',
            'reservation_time' => 'Reserve Date',
            'reservation_name' => 'Reserve By',
            'reservation_id_user' => 'Reservation Id User',
            'reservation_ip_address' => 'Reservation Ip Address',
            'reservation_phone' => 'Reservation Phone',
        ];
    }
}
