<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mst_product_component".
 *
 * @property int $id_mst_product_component
 * @property string|null $kode
 * @property string $nama
 * @property int|null $no_urut
 * @property string|null $no_urut_kode
 * @property string $barcode_kode
 * @property string|null $deskripsi
 * @property int $is_finish_product
 * @property int|null $created_id_user
 * @property string|null $created_date
 * @property string|null $created_ip_address
 */
class MstProductComponent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_product_component';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'kode', 'is_finish_product'], 'required'],
            [['no_urut', 'is_finish_product', 'created_id_user'], 'integer'],
            [['created_date'], 'safe'],
            [['kode', 'barcode_kode'], 'string', 'max' => 50],
            [['nama'], 'string', 'max' => 250],
            [['no_urut_kode'], 'string', 'max' => 20],
            [['deskripsi'], 'string', 'max' => 500],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_product_component' => 'Id Mst Product Component',
            'kode' => 'Kode',
            'nama' => 'Nama',
            'no_urut' => 'No Urut',
            'no_urut_kode' => 'No Urut Kode',
            'barcode_kode' => 'Barcode Kode',
            'deskripsi' => 'Deskripsi',
            'is_finish_product' => 'Is Final Produk?',
            'created_id_user' => 'Created Id User',
            'created_date' => 'Created Date',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getStatusFinalProduk()
    {
        if ($this->is_finish_product == 1) {
            return 'YA';
        } else {
            return "TIDAK";
        }
    }
}
