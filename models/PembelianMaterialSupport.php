<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pembelian_material_support".
 *
 * @property int $id_pembelian_material_support
 * @property int $id_material_support
 * @property string $tanggal_pembelian
 * @property string $nomor_faktur
 * @property int $jumlah
 * @property int $harga_satuan
 * @property string|null $keterangan
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class PembelianMaterialSupport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembelian_material_support';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_material_support', 'tanggal_pembelian', 'nomor_faktur', 'jumlah', 'harga_satuan'], 'required'],
            [['id_material_support', 'jumlah', 'harga_satuan', 'created_id_user'], 'integer'],
            [['tanggal_pembelian', 'created_date'], 'safe'],
            [['nomor_faktur', 'keterangan'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pembelian_material_support' => 'Id Pembelian Material Support',
            'id_material_support' => 'Material Support',
            'tanggal_pembelian' => 'Tanggal Pembelian',
            'nomor_faktur' => 'Nomor Faktur',
            'jumlah' => 'Jumlah',
            'harga_satuan' => 'Harga Satuan',
            'keterangan' => 'Keterangan',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getMaterialSupport()
    {
        return $this->hasOne(MaterialSupport::className(), ['id_material_support' => 'id_material_support']);
    }
}
