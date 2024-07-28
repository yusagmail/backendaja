<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id_customer
 * @property string $nama_customer
 * @property string $alamat
 * @property string $alamat_lain
 * @property int $id_propinsi
 * @property string|null $nomor_telepon
 * @property string|null $telepon_rumah
 * @property string|null $email
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_customer', 'alamat', 'alamat_lain', 'id_propinsi'], 'required'],
            [['id_propinsi'], 'integer'],
            [['nama_customer', 'alamat', 'alamat_lain', 'telepon_rumah', 'email'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_customer' => 'Id Customer',
            'nama_customer' => 'Nama Customer',
            'alamat' => 'Alamat',
            'alamat_lain' => 'Alamat Lengkap',
            'id_propinsi' => 'Id Propinsi',
            'telepon_rumah' => 'Nomor Telepon',
            'email' => 'Email',
        ];
    }

    
    public function getIdpropinsi()
    {
        return $this->hasOne(AssetCode::className(), ['id_propinsi' => 'id_propinsi']);
    }
}
