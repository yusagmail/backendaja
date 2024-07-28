<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sales_retur_item".
 *
 * @property int $id_sales_retur_item
 * @property int $retur_id_sales_order
 * @property int $retur_id_sales_retur
 * @property int $retur_id_outlet_penjualan
 * @property int|null $retur_created_id_user
 * @property string|null $retur_created_date
 * @property string|null $retur_created_ip_address
 * @property int $id_material_finish
 * @property int $id_material
 * @property int $id_material_kategori1
 * @property int $id_material_kategori2
 * @property int $id_material_kategori3
 * @property int $yard
 * @property string|null $kode
 * @property int $year
 * @property int $no_urut
 * @property string $no_urut_kode
 * @property int $no_splitting
 * @property string $barcode_kode
 * @property string|null $deskripsi
 * @property int $is_packing
 * @property int $id_basic_packing
 * @property int $id_material_in_item_proc
 * @property int $id_material_in
 * @property int $is_join_packing
 * @property string|null $join_info
 * @property int $id_gudang
 * @property int|null $created_id_user
 * @property string|null $created_date
 * @property string|null $created_ip_address
 */
class SalesReturItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales_retur_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['retur_id_sales_order', 'retur_id_sales_retur', 'retur_id_outlet_penjualan', 'id_material_finish', 'id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'yard', 'year', 'no_urut', 'no_urut_kode', 'no_splitting', 'barcode_kode', 'is_packing', 'id_basic_packing', 'id_material_in_item_proc', 'id_material_in', 'id_gudang'], 'required'],
            [['retur_id_sales_order', 'retur_id_sales_retur', 'retur_id_outlet_penjualan', 'retur_created_id_user', 'id_material_finish', 'id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'yard', 'year', 'no_urut', 'no_splitting', 'is_packing', 'id_basic_packing', 'id_material_in_item_proc', 'id_material_in', 'is_join_packing', 'id_gudang', 'created_id_user'], 'integer'],
            [['retur_created_date', 'created_date'], 'safe'],
            [['retur_created_ip_address', 'created_ip_address'], 'string', 'max' => 64],
            [['kode', 'barcode_kode'], 'string', 'max' => 50],
            [['no_urut_kode'], 'string', 'max' => 20],
            [['deskripsi'], 'string', 'max' => 500],
            [['join_info'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sales_retur_item' => 'Id Sales Retur Item',
            'retur_id_sales_order' => 'Retur Id Sales Order',
            'retur_id_sales_retur' => 'Retur Id Sales Retur',
            'retur_id_outlet_penjualan' => 'Retur Id Outlet Penjualan',
            'retur_created_id_user' => 'Retur Created Id User',
            'retur_created_date' => 'Retur Created Date',
            'retur_created_ip_address' => 'Retur Created Ip Address',
            'id_material_finish' => 'Id Material Finish',
            'id_material' => 'Material',
            'id_material_kategori1' => 'Warna',
            'id_material_kategori2' => 'Jenis',
            'id_material_kategori3' => 'Motif',
            'yard' => 'Yard',
            'kode' => 'Kode',
            'year' => 'Thn. Prod',
            'no_urut' => 'No Urut',
            'no_urut_kode' => 'No Urut Kode',
            'barcode_kode' => 'Barcode Kode',
            'deskripsi' => 'Catatan Lain',
            'is_packing' => 'Is Packing',
            'id_basic_packing' => 'Basic Packing',
            'id_material_in_item_proc' => 'Id Material In Item Proc',
            'id_material_in' => 'Id Material In',
            'id_gudang' => 'Gudang',
            'sales_id_outlet_penjualan' => 'Outlet',
            'created_id_user' => 'Created Id User',
            'created_date' => 'Created Date',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getMater()
    {
        return $this->hasOne(Material::className(), ['id_material' => 'id_material']);
    }

    public function getMaterialKategori1()
    {
        return $this->hasOne(MaterialKategori1::className(), ['id_material' => 'id_material_kategori1']);
    }

    public function getMaterialKategori2()
    {
        return $this->hasOne(MaterialKategori2::className(), ['id_material' => 'id_material_kategori2']);
    }

    public function getMaterialKategori3()
    {
        return $this->hasOne(MaterialKategori3::className(), ['id_material' => 'id_material_kategori3']);
    }

    public function getGudang()
    {
        return $this->hasOne(Gudang::className(), ['id_gudang' => 'id_gudang']);
    }

    public function getSalesOrder()
    {
        return $this->hasOne(SalesOrder::className(), ['id_sales_order' => 'sales_id_sales_order']);
    }

    public function getOutletPenjualan()
    {
        return $this->hasOne(OutletPenjualan::className(), ['id_outlet_penjualan' => 'sales_id_outlet_penjualan']);
    }
}
