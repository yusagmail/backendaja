<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_item_mapping".
 *
 * @property int $id_asset_item_mapping
 * @property int $id_asset_item
 * @property int|null $id_sensor
 * @property int|null $id_point
 */
class AssetItemMapping extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_item_mapping';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item'], 'required'],
            [['id_asset_item', 'id_sensor', 'id_point'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_item_mapping' => 'Id Asset Item Mapping',
            'id_asset_item' => 'Asset Item',
            'id_sensor' => 'Sensor',
            'id_point' => 'Point',
        ];
    }

    public function getPoint()
    {
        return $this->hasOne(Point::className(), ['id_point' => 'id_point']);
    }

    public function getSensor()
    {
        return $this->hasOne(Sensor::className(), ['id_sensor' => 'id_sensor']);
    }
}
