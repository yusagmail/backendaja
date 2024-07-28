<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "material_finish".
 *
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
 * @property string $barcode_kode
 * @property string|null $deskripsi
 * @property int $is_packing
 * @property int $id_basic_packing
 * @property int $id_material_in_item_proc
 * @property int $id_material_in
 * @property int $id_gudang
 * @property int|null $created_id_user
 * @property string|null $created_date
 * @property string|null $created_ip_address
 */
class MaterialFinishDrop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    var $jumlah;
    var $total_yard;
    
    public static function tableName()
    {
        return 'material_finish_drop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'yard', 'year',  'is_packing', 'id_basic_packing', 'id_material_in_item_proc', 'id_material_in', 'id_gudang', 'is_join_packing'], 'required'],
            [['id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'yard', 'year', 'no_urut', 'is_packing', 'id_basic_packing', 'id_material_in_item_proc', 'id_material_in', 'is_join_packing', 'id_gudang', 'created_id_user'], 'integer'],
            [['created_date'], 'safe'],
            [['kode', 'barcode_kode', 'join_info'], 'string', 'max' => 50],
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
            'is_join_packing' => 'Join Packing?',
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
}
