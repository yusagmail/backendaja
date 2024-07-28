<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "item_product_component".
 *
 * @property int $id_item_product_component
 * @property int $id_mst_product_component
 * @property string|null $kode_item
 * @property string|null $nama_item
 * @property int|null $no_urut
 * @property string|null $no_urut_kode
 * @property string|null $barcode_item_kode
 * @property string|null $catatan
 * @property int $id_gudang
 * @property int|null $created_id_user
 * @property string|null $created_date
 * @property string|null $created_ip_address
 */
class ItemProductComponent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_product_component';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mst_product_component', 'id_gudang'], 'required'],
            [['id_mst_product_component', 'no_urut', 'id_gudang', 'created_id_user'], 'integer'],
            [['created_date'], 'safe'],
            [['kode_item'], 'string', 'max' => 50],
            [['nama_item', 'barcode_item_kode'], 'string', 'max' => 250],
            [['no_urut_kode'], 'string', 'max' => 20],
            [['catatan'], 'string', 'max' => 500],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_item_product_component' => 'Id Item Product Component',
            'id_mst_product_component' => 'Product',
            'kode_item' => 'Kode Item',
            'nama_item' => 'Nama Item',
            'no_urut' => 'No Urut',
            'no_urut_kode' => 'No Urut Kode',
            'barcode_item_kode' => 'Barcode Item Kode',
            'catatan' => 'Catatan',
            'id_gudang' => 'Id Gudang',
            'created_id_user' => 'Created Id User',
            'created_date' => 'Created Date',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
