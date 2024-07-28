<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sensor_label".
 *
 * @property int $id_sensor_label
 * @property int $id_sensor_type
 * @property string $type_channel
 * @property int $channel_number
 * @property string $channel_name
 * @property float|null $batas_bawah
 * @property int|null $is_warning_batas_bawah
 * @property string|null $color_batas_bawah
 * @property float|null $batas_atas
 * @property int|null $is_warning_batas_atas
 * @property int|null $color_batas_atas
 * @property string|null $color_normal
 */
class SensorLabel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sensor_label';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sensor_type', 'channel_number', 'channel_name'], 'required'],
            [['id_sensor_type', 'channel_number', 'is_warning_batas_bawah', 'is_warning_batas_atas', 'color_batas_atas'], 'integer'],
            [['type_channel', 'satuan'], 'string'],
            [['batas_bawah', 'batas_atas'], 'number'],
            [['channel_name'], 'string', 'max' => 250],
            [['color_batas_bawah', 'color_normal'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sensor_label' => 'Id Sensor Label',
            'id_sensor_type' => 'Sensor Type',
            'type_channel' => 'Type Channel',
            'channel_number' => 'Channel Number',
            'channel_name' => 'Channel Name',
            'satuan' => 'Satuan',
            'batas_bawah' => 'Lower Limit',
            'is_warning_batas_bawah' => 'Is Warning Batas Bawah',
            'color_batas_bawah' => 'Color Batas Bawah',
            'batas_atas' => 'Upper Limit',
            'is_warning_batas_atas' => 'Is Warning Batas Atas',
            'color_batas_atas' => 'Color Batas Atas',
            'color_normal' => 'Color Normal',
        ];
    }

    public function getSensorType()
    {
        return $this->hasOne(SensorType::className(), ['id_sensor_type' => 'id_sensor_type']);
    }
}
