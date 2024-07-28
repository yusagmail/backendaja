<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_item_event_participant".
 *
 * @property int $id_asset_item_event_participant
 * @property string $id_asset_item_event
 * @property string $participant_type
 * @property int|null $id_user
 * @property string $participant_name
 * @property string|null $participant_affiliation
 * @property string|null $participant_phone
 * @property string|null $participant_email
 * @property string|null $participant_position
 * @property int $is_confirm_present
 * @property int $is_present
 * @property string $checkin_time
 * @property string $checkout_time
 * @property int $has_print_certificate
 */
class AssetItemEventParticipant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_item_event_participant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item_event', 'participant_type', 'participant_name', 'checkin_time', 'checkout_time'], 'required'],
            [['participant_type'], 'string'],
            [['id_user', 'is_confirm_present', 'is_present', 'has_print_certificate'], 'integer'],
            [['checkin_time', 'checkout_time'], 'safe'],
            [['id_asset_item_event', 'participant_name', 'participant_affiliation', 'participant_phone', 'participant_email', 'participant_position'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_item_event_participant' => 'Id Asset Item Event Participant',
            'id_asset_item_event' => 'Id Asset Item Event',
            'participant_type' => 'Participant Type',
            'id_user' => 'Id User',
            'participant_name' => 'Participant Name',
            'participant_affiliation' => 'Participant Affiliation',
            'participant_phone' => 'Participant Phone',
            'participant_email' => 'Participant Email',
            'participant_position' => 'Participant Position',
            'is_confirm_present' => 'Is Confirm Present',
            'is_present' => 'Is Present',
            'checkin_time' => 'Checkin Time',
            'checkout_time' => 'Checkout Time',
            'has_print_certificate' => 'Has Print Certificate',
        ];
    }
}
