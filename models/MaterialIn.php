<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "material_in".
 *
 * @property int $id_material_in
 * @property int $id_unit_poduksi
 * @property int $id_material
 * @property string $varian
 * @property string $tanggal_proses
 * @property string|null $catatan
 * @property int|null $created_id_user
 * @property string|null $created_date
 * @property string|null $created_ip_address
 */
class MaterialIn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material_in';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_unit_poduksi', 'id_material', 'tanggal_proses', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'tanggal_surat_jalan', 'nomor_surat_jalan', 'id_supplier'], 'required'],
            [['id_unit_poduksi', 'id_material', 'created_id_user', 'harga_beli_peryard'], 'integer'],
            [['tanggal_proses', 'created_date', 'tanggal_surat_jalan'], 'safe'],
            [['varian', 'catatan','nomor_surat_jalan'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_material_in' => 'Id Material In',
            'id_unit_poduksi' => 'Unit Poduksi',
            'id_material' => 'Material',
            'id_material_kategori1' => 'Warna',
            'id_material_kategori2' => 'Jenis',
            'id_material_kategori3' => 'Motif',
            'id_supplier' => 'Supplier',
            'tanggal_surat_jalan' => 'Tgl. SJ',
            'nomor_surat_jalan' => 'No. Surat Jalan (SJ)',
            'varian' => 'Varian',
            'tanggal_proses' => 'Tgl. Produksi',
            'catatan' => 'Catatan',
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

    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id_supplier' => 'id_supplier']);
    }
}
