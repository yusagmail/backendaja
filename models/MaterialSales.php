<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "material_sales".
 *
 * @property int $id_material_sales
 * @property int $sales_id_sales_order
 * @property int|null $sales_harga_jual
 * @property int|null $sales_created_id_user
 * @property string|null $sales_created_date
 * @property string|null $sales_created_ip_address
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
class MaterialSales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    var $jumlah; //Jumlah Total Yard ketika di grouping

    public static function tableName()
    {
        return 'material_sales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sales_id_sales_order', 'id_material_finish', 'id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'yard', 'year', 'no_urut', 'no_urut_kode', 'no_splitting', 'barcode_kode', 'is_packing', 'id_basic_packing', 'id_material_in_item_proc', 'id_material_in', 'id_gudang'], 'required'],
            [['sales_id_sales_order', 'sales_harga_jual', 'sales_created_id_user', 'id_material_finish', 'id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'yard', 'year', 'no_urut', 'no_splitting', 'is_packing', 'id_basic_packing', 'id_material_in_item_proc', 'id_material_in', 'is_join_packing', 'id_gudang', 'created_id_user'], 'integer'],
            [['sales_created_date', 'created_date'], 'safe'],
            [['sales_created_ip_address', 'created_ip_address'], 'string', 'max' => 64],
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
            'id_material_sales' => 'Id Material Sales',
            'sales_id_sales_order' => 'Sales Id Sales Order',
            'sales_harga_jual' => 'Harga Jual',
            'sales_created_id_user' => 'Sales Created Id User',
            'sales_created_date' => 'Sales Created Date',
            'sales_created_ip_address' => 'Sales Created Ip Address',
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

    public static function rollBackToMaterialFinish($materialsales){
        //1. Rollback, kembalikan ke material_finish
        //$materialsales = $this->findModelItem($id_item);
        $materialfinish = \backend\models\MaterialFinish::find()->where([
                'id_material_finish' => $materialsales->id_material_finish,
            ])
            ->one();
        if($materialfinish == null){
            $materialfinish = new \backend\models\MaterialFinish();
        }
        $materialfinish->id_material_finish = $materialsales->id_material_finish;
        $materialfinish->id_material = $materialsales->id_material;
        $materialfinish->id_material_kategori1 = $materialsales->id_material_kategori1;
        $materialfinish->id_material_kategori2 = $materialsales->id_material_kategori2;
        $materialfinish->id_material_kategori3 = $materialsales->id_material_kategori3;
        $materialfinish->yard = $materialsales->yard;
        $materialfinish->kode = $materialsales->kode;
        $materialfinish->year = $materialsales->year;
        $materialfinish->no_urut = $materialsales->no_urut;
        $materialfinish->no_urut_kode = $materialsales->no_urut_kode;
        $materialfinish->no_splitting = $materialsales->no_splitting;
        $materialfinish->barcode_kode = $materialsales->barcode_kode;
        $materialfinish->deskripsi = $materialsales->deskripsi;
        $materialfinish->is_packing = $materialsales->is_packing;
        $materialfinish->id_basic_packing = $materialsales->id_basic_packing;
        $materialfinish->id_material_in_item_proc = $materialsales->id_material_in_item_proc;
        $materialfinish->id_material_in = $materialsales->id_material_in;
        $materialfinish->is_join_packing = $materialsales->is_join_packing;
        $materialfinish->join_info = $materialsales->join_info;
        $materialfinish->id_gudang = $materialsales->id_gudang;
        $materialfinish->created_id_user = $materialsales->created_id_user;
        $materialfinish->created_date = $materialsales->created_date;
        $materialfinish->created_ip_address = $materialsales->created_ip_address;
        $materialfinish->save(false);

        //2. Hapus dari materialsales
        $materialsales->delete();
    }

    public static function saveToSalesReturItem($materialsales){
        //$materialsales = $this->findModelItem($id_item);
        $materialfinish = \backend\models\SalesReturItem::find()->where([
                'id_material_finish' => $materialsales->id_material_finish,
            ])
            ->one();
        if($materialfinish == null){
            $materialfinish = new \backend\models\SalesReturItem();
        }
        $materialfinish->id_material_finish = $materialsales->id_material_finish;
        $materialfinish->id_material = $materialsales->id_material;
        $materialfinish->id_material_kategori1 = $materialsales->id_material_kategori1;
        $materialfinish->id_material_kategori2 = $materialsales->id_material_kategori2;
        $materialfinish->id_material_kategori3 = $materialsales->id_material_kategori3;
        $materialfinish->yard = $materialsales->yard;
        $materialfinish->kode = $materialsales->kode;
        $materialfinish->year = $materialsales->year;
        $materialfinish->no_urut = $materialsales->no_urut;
        $materialfinish->no_urut_kode = $materialsales->no_urut_kode;
        $materialfinish->no_splitting = $materialsales->no_splitting;
        $materialfinish->barcode_kode = $materialsales->barcode_kode;
        $materialfinish->deskripsi = $materialsales->deskripsi;
        $materialfinish->is_packing = $materialsales->is_packing;
        $materialfinish->id_basic_packing = $materialsales->id_basic_packing;
        $materialfinish->id_material_in_item_proc = $materialsales->id_material_in_item_proc;
        $materialfinish->id_material_in = $materialsales->id_material_in;
        $materialfinish->is_join_packing = $materialsales->is_join_packing;
        $materialfinish->join_info = $materialsales->join_info;
        $materialfinish->id_gudang = $materialsales->id_gudang;
        $materialfinish->created_id_user = $materialsales->created_id_user;
        $materialfinish->created_date = $materialsales->created_date;
        $materialfinish->created_ip_address = $materialsales->created_ip_address;

        //Data Sales Juga ikut dicopy
        $materialfinish->sales_id_sales_order = $materialsales->sales_id_sales_order;
        $materialfinish->sales_harga_jual = $materialsales->sales_harga_jual;
        $materialfinish->sales_id_outlet_penjualan = $materialsales->sales_id_outlet_penjualan;
        $materialfinish->sales_created_id_user = $materialsales->sales_created_id_user;
        $materialfinish->sales_created_date = $materialsales->sales_created_date;
        $materialfinish->sales_created_ip_address = $materialsales->sales_created_ip_address;

        $materialfinish->save(false);

        return $materialfinish;
    }

    public static function rollBackFromReturToSales($materialreturitem){
        //$materialreturitem = $this->findModelItem($id_item);
        $materialsales = \backend\models\MaterialSales::find()->where([
                'id_material_finish' => $materialreturitem->id_material_finish,
            ])
            ->one();
        if($materialsales == null){
            $materialsales = new \backend\models\MaterialSales();
        }
        $materialsales->id_material_finish = $materialreturitem->id_material_finish;
        $materialsales->id_material = $materialreturitem->id_material;
        $materialsales->id_material_kategori1 = $materialreturitem->id_material_kategori1;
        $materialsales->id_material_kategori2 = $materialreturitem->id_material_kategori2;
        $materialsales->id_material_kategori3 = $materialreturitem->id_material_kategori3;
        $materialsales->yard = $materialreturitem->yard;
        $materialsales->kode = $materialreturitem->kode;
        $materialsales->year = $materialreturitem->year;
        $materialsales->no_urut = $materialreturitem->no_urut;
        $materialsales->no_urut_kode = $materialreturitem->no_urut_kode;
        $materialsales->no_splitting = $materialreturitem->no_splitting;
        $materialsales->barcode_kode = $materialreturitem->barcode_kode;
        $materialsales->deskripsi = $materialreturitem->deskripsi;
        $materialsales->is_packing = $materialreturitem->is_packing;
        $materialsales->id_basic_packing = $materialreturitem->id_basic_packing;
        $materialsales->id_material_in_item_proc = $materialreturitem->id_material_in_item_proc;
        $materialsales->id_material_in = $materialreturitem->id_material_in;
        $materialsales->is_join_packing = $materialreturitem->is_join_packing;
        $materialsales->join_info = $materialreturitem->join_info;
        $materialsales->id_gudang = $materialreturitem->id_gudang;
        $materialsales->created_id_user = $materialreturitem->created_id_user;
        $materialsales->created_date = $materialreturitem->created_date;
        $materialsales->created_ip_address = $materialreturitem->created_ip_address;

        //Data Sales Juga ikut dicopy
        $materialsales->sales_id_sales_order = $materialreturitem->sales_id_sales_order;
        $materialsales->sales_harga_jual = $materialreturitem->sales_harga_jual;
        $materialsales->sales_id_outlet_penjualan = $materialreturitem->sales_id_outlet_penjualan;
        $materialsales->sales_created_id_user = $materialreturitem->sales_created_id_user;
        $materialsales->sales_created_date = $materialreturitem->sales_created_date;
        $materialsales->sales_created_ip_address = $materialreturitem->sales_created_ip_address;

        $materialsales->save(false);

        return $materialsales;
    }
}
