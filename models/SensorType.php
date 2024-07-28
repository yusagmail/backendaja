<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sensor_type".
 *
 * @property int $id_sensor_type
 * @property string $sensor_type
 * @property string|null $description
 */
class SensorType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sensor_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sensor_type'], 'required'],
            [['sensor_type', 'description'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sensor_type' => 'Id Sensor Type',
            'sensor_type' => 'Sensor Type',
            'description' => 'Description',
        ];
    }
}
