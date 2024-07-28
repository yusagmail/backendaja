<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "warehouse".
 *
 * @property int $id_warehouse
 * @property string $nama_warehouse
 * @property string|null $alamat
 * @property string|null $deskripsi
 * @property string|null $longitude
 * @property string|null $latitude
 * @property string $id_witel
 */
class Warehouse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'warehouse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_warehouse', 'id_witel'], 'required'],
            [['nama_warehouse', 'alamat', 'deskripsi'], 'string', 'max' => 250],
            [['longitude', 'latitude'], 'string', 'max' => 50],
            [['id_witel'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_warehouse' => 'Id Warehouse',
            'nama_warehouse' => 'Nama Warehouse',
            'alamat' => 'Alamat',
            'deskripsi' => 'Deskripsi',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'id_witel' => 'Id Witel',
        ];
    }
}
