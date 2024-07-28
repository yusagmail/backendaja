<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reference_point".
 *
 * @property int|null $id_reference_point
 * @property string $name
 * @property string|null $display_name
 * @property string|null $latitude
 * @property string|null $longitude
 */
class ReferencePoint extends \yii\db\ActiveRecord
{
    var $id_parent = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reference_point';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'latitude', 'longitude'], 'required'],
            [['name', 'display_name', 'latitude', 'longitude'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_reference_point' => 'Id Reference Point',
            'name' => 'Name',
            'display_name' => 'Display Name',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];
    }
}
