<?php

namespace backend\models;

use backend\models\MaterialRawKategori1;
use backend\models\Subcontractor;
use Yii;

/**
 * This is the model class for table "material_sampel".
 *
 * @property int $id_material_sampel
 * @property int $id_customer
 * @property string $nama_sampel
 * @property int $id_material_raw_kategori
 * @property string $tanggal_minta_sampel
 * @property string $tanggal_keluar_sampel
 * @property int $id_subcontractor
 * @property int $id_material
 * @property int $id_material_kategori1
 * @property int $id_material_kategori2
 * @property int $id_material_kategori3
 * @property string $kode_barcode
 * @property string $keterangan
 * @property string $status
 * @property int|null $created_id_user
 * @property string|null $created_date
 * @property string|null $created_ip_address
 */
class MaterialSampel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material_sampel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_customer', 'nama_sampel', 'id_material_raw_kategori', 'tanggal_minta_sampel', 'tanggal_keluar_sampel', 'id_subcontractor', 'id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3'], 'required'],
            [['id_material_sampel', 'id_customer', 'id_material_raw_kategori', 'id_subcontractor', 'id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'created_id_user'], 'integer'],
            [['tanggal_minta_sampel', 'tanggal_keluar_sampel', 'created_date'], 'safe'],
            [['status'], 'string'],
            [['nama_sampel', 'keterangan'], 'string', 'max' => 250],
            [['kode_barcode'], 'string', 'max' => 50],
            [['created_ip_address'], 'string', 'max' => 64],
            [['id_material_sampel'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_material_sampel' => 'Id Material Sampel',
            'id_customer' => 'Customer',
            'nama_sampel' => 'Nama Sampel',
            'id_material_raw_kategori' => 'Greige',
            'tanggal_minta_sampel' => 'Tgl. Minta Sampel',
            'tanggal_keluar_sampel' => 'Tgl. Keluar Sampel',
            'id_subcontractor' => 'Subcontractor',
            'id_material' => 'Material',
            'id_material_kategori1' => 'Warna',
            'id_material_kategori2' => 'Jenis',
            'id_material_kategori3' => 'Motif',
            'kode_barcode' => 'Kode Barcode',
            'keterangan' => 'Keterangan',
            'status' => 'Status',
            'created_id_user' => 'Created Id User',
            'created_date' => 'Created Date',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id_customer' => 'id_customer']);
    }

    public function getMaterialRawKategori()
    {
        return $this->hasOne(MaterialRawKategori1::className(), ['id_material_raw_kategori' => 'id_material_raw_kategori']);
    }

    public function getSubcontractor()
    {
        return $this->hasOne(Subcontractor::className(), ['id_subcontractor' => 'id_subcontractor']);
    }

    public function getMaterial()
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

    public function generateCode(){

        //Generate Number dengan metode yang baru
        $organizationNumber = Yii::$app->params['sampel-kode'];
        $this->kode_barcode = \common\helpers\BarcodeHelper::generateEANProductNumberVer2($this->id_material_sampel, $organizationNumber);
       

    }
}
