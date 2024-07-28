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
class MaterialFinish extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    var $jumlah;
    var $total_yard;
    
    public static function tableName()
    {
        return 'material_finish';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'yard', 'year',  'is_packing', 'id_basic_packing', 'id_material_in_item_proc', 'id_material_in', 'id_gudang', 'is_join_packing'], 'required'],
            [['id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'yard', 'year', 'no_urut', 'is_packing', 'id_basic_packing', 'id_material_in_item_proc', 'id_material_in', 'is_join_packing', 'id_gudang', 'created_id_user', 'id_pallet_gudang'], 'integer'],
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
            'id_pallet_gudang' => 'Pallet',
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

    public function getPallete()
    {
        return $this->hasOne(PalletGudang::className(), ['id_pallet_gudang' => 'id_pallet_gudang']);
    }

    public function getDetailBarang(){
        $gudang = "";
        if(isset($this->gudang)){
            $gudang = $this->gudang->nama_gudang;
        }
        return $this->kode." ".$this->yard."yard di ".$gudang;
    }

    public function genereateNomorUrut(){
        if($this->no_urut_kode == ""){
            $max = MaterialFinish::find()
            ->where(['id_material' => $this->id_material,
                'id_material_kategori1' => $this->id_material_kategori1,
                'id_material_kategori2' => $this->id_material_kategori2,
                'id_material_kategori3' => $this->id_material_kategori3,
                'year' => $this->year,
                ])
            ->max('no_urut');


            $this->no_urut = $max+1;
            $nomer = sprintf("%04d", $this->no_urut); //4 digit saja
            $this->no_urut_kode = $nomer;
            
            //Kode Gabungan
            //$kode= "PST.PI.".$date[2].$date[1].$date[0].".".$nomer;
            $kode = $this->mater->kode."-".$this->materialKategori1->kode."-".$this->materialKategori2->kode."-".$this->materialKategori3->kode."-".substr($this->year,2,2)."-".$nomer;
           
            $this->kode = $kode;

        }
        $nomer = sprintf("%04d", $this->no_urut); //4 digit saja
        $kode = $this->mater->kode."-".$this->materialKategori1->kode."-".$this->materialKategori2->kode."-".$this->materialKategori3->kode."-".substr($this->year,2,2)."-".$nomer;

        //$this->barcode_kode = \common\helpers\BarcodeHelper::generateEAN($this->id_material_finish);
        //Generate Number dengan metode yang baru
        $organizationNumber = Yii::$app->params['organization-kode'];
        $this->barcode_kode = \common\helpers\BarcodeHelper::generateEANProductNumberVer2_1($this, $this->id_material_finish, $organizationNumber);
       
        $this->kode = $kode;
    }

    public function forceGenerateBarcode(){
        $organizationNumber = Yii::$app->params['organization-kode'];
        $this->barcode_kode = \common\helpers\BarcodeHelper::generateEANProductNumberVer2_1($this, $this->id_material_finish, $organizationNumber);
    }
}
