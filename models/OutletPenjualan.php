<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "outlet_penjualan".
 *
 * @property int $id_outlet_penjualan
 * @property string $nama_outlet
 * @property string|null $alamat
 * @property string|null $kota
 * @property string|null $logo
 * @property string|null $longitude
 * @property string|null $latitude
 * @property string|null $keterangan
 */
class OutletPenjualan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'outlet_penjualan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_outlet', 'kode_outlet'], 'required'],
            [['nama_outlet', 'alamat', 'kota', 'logo', 'keterangan'], 'string', 'max' => 250],
            [['longitude', 'latitude'], 'string', 'max' => 150],
            [['kode_outlet'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_outlet_penjualan' => 'Id Outlet Penjualan',
            'nama_outlet' => 'Nama Outlet',
            'kode_outlet' => 'Kode Outlet',
            'alamat' => 'Alamat',
            'kota' => 'Kota',
            'logo' => 'Logo',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'keterangan' => 'Keterangan',
        ];
    }
}
