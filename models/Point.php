<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "point".
 *
 * @property int|null $id_point
 * @property string $name
 * @property string|null $icon
 * @property string|null $color
 * @property string|null $latitude
 * @property string|null $longitude
 */
class Point extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'point';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'latitude', 'longitude'], 'string', 'max' => 100],
            [['icon', 'color'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_point' => 'Id Point',
            'name' => 'Name',
            'icon' => 'Icon',
            'color' => 'Color',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];
    }
}
