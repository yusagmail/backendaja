<?php

namespace backend\models;

/**
 * This is the model class for table "location".
 *
 * @property int $id_location
 * @property string $location_name
 * @property string $description1
 * @property string $description2
 * @property string $latitude
 * @property string $longitude
 * @property string $address
 * @property int $id_kabupaten
 * @property int $id_propinsi
 * @property int $id_kecamatan
 * @property int $id_kelurahan
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['location_name', 'address'], 'required'],
            [['description1', 'description2'], 'string'],
            [['id_kabupaten', 'id_propinsi', 'id_kecamatan', 'id_kelurahan'], 'integer'],
            [['location_name', 'address'], 'string', 'max' => 250],
            [['latitude', 'longitude'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_location' => 'Id Location',
            'location_name' => 'Location Name',
            'description1' => 'Description1',
            'description2' => 'Description2',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'address' => 'Address',
            'id_kabupaten' => 'Id Kabupaten',
            'id_propinsi' => 'Id Propinsi',
            'id_kecamatan' => 'Id Kecamatan',
            'id_kelurahan' => 'Id Kelurahan',
        ];
    }
    public function getAssetItemLocation()
    {
        return $this->hasOne(AssetItemLocation::className(), ['id_asset_item_location' => 'id_asset_item_location']);
    }
	
	public function getKelurahan()
    {
        return $this->hasOne(Kelurahan::className(), ['id_kelurahan' => 'id_kelurahan']);
    }

    public function getPropinsi()
    {
        return $this->hasOne(Propinsi::className(), ['id_propinsi' => 'id_propinsi']);
    }

    public function getKabupaten()
    {
        return $this->hasOne(Kabupaten::className(), ['id_kabupaten' => 'id_kabupaten']);
    }

    public function getKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['id_kecamatan' => 'id_kecamatan']);
    }
}
