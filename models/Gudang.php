<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "gudang".
 *
 * @property int $id_gudang
 * @property string $nama_gudang
 * @property string|null $kode_gudang
 * @property string|null $alamat
 * @property string|null $deskripsi
 * @property string|null $longitude
 * @property string|null $latitude
 */
class Gudang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gudang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_gudang'], 'required'],
            [['nama_gudang', 'alamat', 'deskripsi'], 'string', 'max' => 250],
            [['kode_gudang'], 'string', 'max' => 100],
            [['longitude', 'latitude'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_gudang' => 'Id Gudang',
            'nama_gudang' => 'Nama Gudang',
            'kode_gudang' => 'Kode Gudang',
            'alamat' => 'Alamat',
            'deskripsi' => 'Deskripsi',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
        ];
    }
}
