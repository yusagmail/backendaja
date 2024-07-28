<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sales_order".
 *
 * @property int $id_sales_order
 * @property string $tanggal_order
 * @property int $id_customer
 * @property int $id_outlet_penjualan
 * @property string|null $nomor_sales_order
 * @property int $nomor
 * @property int $month
 * @property int $year
 * @property int $invoice_total
 * @property int $bayar_total_bayar
 * @property string $bayar_cara
 * @property int $bayar_id_bank_pembayaran
 * @property int $bayar_uang_muka
 * @property string|null $bayar_bukti
 * @property string $status_order
 * @property int|null $created_id_user
 * @property string|null $created_date
 * @property string|null $created_ip_address
 */
class SalesOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_order', 'id_customer', 'id_outlet_penjualan', 'nomor', 'month', 'year'], 'required'],
            [['tanggal_order', 'created_date'], 'safe'],
            [['id_customer', 'id_outlet_penjualan', 'nomor', 'month', 'year', 'invoice_total', 'bayar_total_bayar', 'bayar_id_bank_pembayaran', 'bayar_uang_muka', 'created_id_user'], 'integer'],
            [['bayar_cara', 'status_order', 'status_pembayaran', 'status_invoice'], 'string'],
            [['nomor_sales_order'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 64],

            //Maxsize 5 MB
            [['bayar_bukti'], 'file', 'skipOnEmpty' => true, 'extensions'=>'jpg, jpeg, png', 'maxSize' => 5*1024*1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sales_order' => 'Id Sales Order',
            'tanggal_order' => 'Tanggal Order',
            'id_customer' => 'Customer',
            'id_outlet_penjualan' => 'Outlet Penjualan',
            'nomor_sales_order' => 'Nomor Sales Order',
            'nomor' => 'Nomor',
            'month' => 'Bulan',
            'year' => 'Tahun',
            'invoice_total' => 'Invoice Total',
            'bayar_total_bayar' => 'Jumlah Pembayaran',
            'bayar_cara' => 'Cara Pembayaran',
            'bayar_id_bank_pembayaran' => 'Bank Pembayaran',
            'bayar_uang_muka' => 'Uang Muka',
            'bayar_bukti' => 'Bayar Bukti',
            'status_order' => 'Status Order',
            'status_pembayaran' => 'Status Pembayaran',
            'created_id_user' => 'Created Id User',
            'created_date' => 'Created Date',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id_customer' => 'id_customer']);
    }

    public function getBankPembayaran()
    {
        return $this->hasOne(BankPembayaran::className(), ['id_bank_pembayaran' => 'bayar_id_bank_pembayaran']);
    }

    public function getOutletPenjualan()
    {
        return $this->hasOne(OutletPenjualan::className(), ['id_outlet_penjualan' => 'id_outlet_penjualan']);
    }

    public function generateNomorSalesOrderOld(){
        if($this->nomor_sales_order == ""){
            $max = SalesOrder::find()
            ->where([
                'month' => $this->month,
                'year' => $this->year,
                ])
            ->max('nomor');


            $this->nomor = $max+1;
            $nomer = sprintf("%04d", $this->nomor); //4 digit saja
            $this->nomor_sales_order = $nomer."/SO/".$this->month."/".$this->year;
        }
    }

    public function reGenerateNomorSalesOrderOld(){
        $nomer = sprintf("%04d", $this->nomor); //4 digit saja
        $this->nomor_sales_order = $nomer."/SO/".$this->month."/".$this->year;
    }

    /*
    Nomor ditambahkan dengan kode outlet
    */
    public function generateNomorSalesOrder(){
        if($this->nomor_sales_order == ""){
            $max = SalesOrder::find()
            ->where([
                'month' => $this->month,
                'year' => $this->year,
                'id_outlet_penjualan' => $this->id_outlet_penjualan
                ])
            ->max('nomor');


            $this->nomor = $max+1;
            $nomer = sprintf("%04d", $this->nomor); //4 digit saja

            //Kode Outlet
            $kodeoutlet = $this->id_outlet_penjualan;
            if(isset($this->outletPenjualan)){
                $kodeoutlet = $this->outletPenjualan->kode_outlet;
                if($kodeoutlet == ""){
                    $kodeoutlet = "---";
                }
            }

            $this->nomor_sales_order = $nomer."/".$kodeoutlet."/SO/".$this->month."/".$this->year;
        }
    }

    public function reGenerateNomorSalesOrder(){
        $nomer = sprintf("%04d", $this->nomor); //4 digit saja

        //Kode Outlet
        $kodeoutlet = $this->id_outlet_penjualan;
        if(isset($this->outletPenjualan)){
            $kodeoutlet = $this->outletPenjualan->kode_outlet;
            if($kodeoutlet == ""){
                $kodeoutlet = "---";
            }
        }

        $this->nomor_sales_order = $nomer."/".$kodeoutlet."/SO/".$this->month."/".$this->year;

        //$this->nomor_sales_order = $nomer."/SO/".$this->month."/".$this->year;
    }

    public function getInvoiceNumber(){
        if($this->nomor_sales_order != ""){
            return str_replace("/SO/", "/SI/", $this->nomor_sales_order);
        }else{
            return "";
        }
    }

    public function getSuratJalanNumber(){
        if($this->nomor_sales_order != ""){
            return str_replace("/SO/", "/SJ/", $this->nomor_sales_order);
        }else{
            return "";
        }
    }

    public function uploadFileBuktiBayar()
    {
        if ($this->validate()) {
            $uploadedFile = yii\web\UploadedFile::getInstance($this, 'bayar_bukti');
            if (!empty($uploadedFile)) {
                $i = \common\utils\EncryptionDB::encryptor('encrypt',$this->id_sales_order);
                $filename = "fbuktibyr-so-" . $i . '.' . $uploadedFile->extension;
                // $this->attachfile1->saveAs('uploads/' . $this->attachfile1->baseName . '.' . $this->attachfile1->extension);
                //$this->attachFile->saveAs('file/bayar_bukti/' . $filename);

                $this->bayar_bukti = $filename;
                $uploadedFile->saveAs('file/bayar_bukti/' . $filename);

                $this->save(false);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
