<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "subcontractor".
 *
 * @property int $id_subcontractor
 * @property string $nama_subcontractor
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
class Subcontractor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subcontractor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_subcontractor', 'alamat', 'id_kabupaten'], 'required'],
            [['id_kabupaten', 'created_user_id'], 'integer'],
            [['created_date'], 'safe'],
            [['nama_subcontractor', 'alamat', 'nomor_telepon', 'email', 'npwp', 'nama_kontak'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_subcontractor' => 'Id Subcontractor',
            'nama_subcontractor' => 'Nama Kontraktor Makloon',
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
