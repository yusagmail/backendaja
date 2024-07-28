<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "supplier_raw".
 *
 * @property int $id_supplier_raw
 * @property string $nama_supplier
 * @property string $alamat
 * @property int $id_kabupaten
 * @property string|null $nomor_telepon
 * @property string|null $email
 * @property string|null $npwp
 * @property string|null $nama_kontak
 * @property string|null $created_date
 * @property int|null $created_user_id
 * @property string|null $created_ip_address
 */
class SupplierRaw extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier_raw';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_supplier', 'alamat', 'id_kabupaten'], 'required'],
            [['id_kabupaten', 'created_user_id'], 'integer'],
            [['created_date'], 'safe'],
            [['nama_supplier', 'alamat', 'nomor_telepon', 'email', 'npwp', 'nama_kontak'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_supplier_raw' => 'Id Supplier Raw',
            'nama_supplier' => 'Nama Supplier',
            'alamat' => 'Alamat',
            'id_kabupaten' => 'Kabupaten',
            'nomor_telepon' => 'Nomor Telepon',
            'email' => 'Email',
            'npwp' => 'NPWP',
            'nama_kontak' => 'Nama Kontak',
            'created_date' => 'Created Date',
            'created_user_id' => 'Created User ID',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
