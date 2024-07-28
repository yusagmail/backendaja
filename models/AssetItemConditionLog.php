<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_item_condition_log".
 *
 * @property int $id_asset_item_condition_log
 * @property int $id_asset_item
 * @property int $id_mst_status_condition
 * @property string $condition_log_date
 * @property string $condition_log_datetime
 * @property string $condition_log_notes
 * @property string $reported_by
 * @property int $reported_user_id
 * @property string $reported_ip_address
 * @property int $photo1
 */
class AssetItemConditionLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_item_condition_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item', 'id_mst_status_condition', 'condition_log_date', 'condition_log_datetime'], 'required'],
            [['id_asset_item', 'id_mst_status_condition', 'reported_user_id', 'photo1'], 'integer'],
            [['condition_log_date', 'condition_log_datetime'], 'safe'],
            [['condition_log_notes'], 'string'],
            [['reported_by', 'reported_ip_address'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_item_condition_log' => 'Id Asset Item Condition Log',
            'id_asset_item' => 'Id Asset Item',
            'id_mst_status_condition' => 'Id Mst Status Condition',
            'condition_log_date' => 'Condition Log Date',
            'condition_log_datetime' => 'Condition Log Datetime',
            'condition_log_notes' => 'Condition Log Notes',
            'reported_by' => 'Reported By',
            'reported_user_id' => 'Reported User ID',
            'reported_ip_address' => 'Reported Ip Address',
            'photo1' => 'Photo1',
        ];
    }
}
