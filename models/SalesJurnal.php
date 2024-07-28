<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sales_jurnal".
 *
 * @property int $id_sales_jurnal
 * @property string $type
 * @property int $id_sales_order
 * @property int $id_customer
 * @property string $tanggal
 * @property int $id_akun_debit
 * @property int $debit
 * @property int $id_akun_kredit
 * @property int $kredit
 * @property string|null $keterangan
 * @property string $bayar_cara
 * @property int|null $id_bank_pembayaran
 * @property string|null $bayar_bukti
 * @property int|null $jumlah_bayar
 * @property string $created_date
 * @property int $created_user_id
 * @property string $created_ip_address
 */
class SalesJurnal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales_jurnal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'id_sales_order', 'id_customer', 'tanggal', 'id_akun_debit', 'debit', 'id_akun_kredit', 'kredit', 'bayar_cara', 'created_date', 'created_user_id', 'created_ip_address'], 'required'],
            [['type', 'bayar_cara'], 'string'],
            [['id_sales_order', 'id_customer', 'id_akun_debit', 'debit', 'id_akun_kredit', 'kredit', 'id_bank_pembayaran', 'jumlah_bayar', 'created_user_id'], 'integer'],
            [['tanggal', 'created_date'], 'safe'],
            [['keterangan'], 'string', 'max' => 200],
            [['created_ip_address'], 'string', 'max' => 250],

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
            'id_sales_jurnal' => 'Id Sales Jurnal',
            'type' => 'Type',
            'id_sales_order' => 'Id Sales Order',
            'id_customer' => 'Id Customer',
            'tanggal' => 'Tanggal',
            'id_akun_debit' => 'Id Akun Debit',
            'debit' => 'Debit',
            'id_akun_kredit' => 'Id Akun Kredit',
            'kredit' => 'Kredit',
            'keterangan' => 'Keterangan',
            'bayar_cara' => 'Cara Pembayaran',
            'id_bank_pembayaran' => 'Bank Pembayaran',
            'bayar_bukti' => 'Bukti Pembayaran',
            'jumlah_bayar' => 'Jumlah Bayar',
            'created_date' => 'Waktu Penyimpanan',
            'created_user_id' => 'Created User ID',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function uploadFileBuktiBayar()
    {
        if ($this->validate()) {
            $uploadedFile = yii\web\UploadedFile::getInstance($this, 'bayar_bukti');
            if (!empty($uploadedFile)) {
                $i = \common\utils\EncryptionDB::encryptor('encrypt',$this->id_sales_jurnal);
                $filename = "fbuktibyr-sj-" . $i . '.' . $uploadedFile->extension;
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

    public static function saveReturSales($modelso, $id_sales_retur, $total){
         //Create Sales Jurnal
        /*
        Mengurangi piutang. Piutang otomatis tercreate ketika sales dibuat
        */
        $sj = \backend\models\SalesJurnal::find()->where([
              'id_sales_order' => $modelso->id_sales_order,
              'type'=>'RETUR PENJUALAN',
          ])
          ->one();
        if($sj != null){
        }else{
            $sj = new SalesJurnal();
        }
        $sj->type = 'RETUR PENJUALAN';
        $sj->id_sales_order = $modelso->id_sales_order;
        $sj->id_reference = $id_sales_retur;
        $modelsalesorder = $modelso;
        $sj->id_customer = $modelsalesorder->id_customer;
        $sj->tanggal = \common\helpers\Timeanddate::getCurrentDate();

        //Hard Coded dulu
        //$sj->id_akun_debit = 1111; //Hardcoded Kas
        //$sj->id_akun_kredit = 1114; // Piutang Usaha
        $sj->id_akun_debit = \backend\models\AkunSearch::AkunPenjualan();; //Hardcoded Kas
        $sj->id_akun_kredit = \backend\models\AkunSearch::AkunPiutangUsaha(); // Piutang Usaha
        $sj->debit = 0;
        $sj->kredit = $total;
        $sj->id_bank_pembayaran = 0;
        $sj->bayar_bukti = "";
        $sj->bayar_cara = "";

        $sj->jumlah_bayar = $total;
        $sj = \common\helpers\LogHelper::setCreatedLog($sj);
        $sj->save(false);
    }

    public static function updateStatusPembayaran($model){
        $searchModel = new SalesJurnalSearch();
        $searchModel->id_sales_order = $model->id_sales_order;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;

        $models = $dataProvider->getModels();
        $totalPembayaran = 0;
        $totalKredit = 0; //Total Retur
        foreach ($models as $modelsj) {
            $totalPembayaran = $totalPembayaran + $modelsj->debit;
            $totalKredit = $totalKredit + $modelsj->kredit; //Posisi Kredit untuk Retur
        }
        $totalTagihan = $model->invoice_total; //- $totalKredit;
        $sisa = $totalTagihan - $totalKredit - $totalPembayaran;

        if($sisa > 0){
            
            if($sisa == $model->invoice_total){
                $bgColor = 'red';
                $notes = 'Belum ada pembayaran';
                $model->status_pembayaran = 'BELUM';
            }else{
                $bgColor = 'orange';
                $notes = 'Masih ada kekurangan pembayaran!';
                $model->status_pembayaran = 'PARTIAL';
            }
        }elseif ($sisa == 0) {
            $bgColor = 'green';
            $notes = 'Sudah lunas!';
            $model->status_pembayaran = 'LUNAS';
        }else{
            $bgColor = 'orange';
            $notes = 'Lebih bayar / ada utang ke customer!';
            $model->status_pembayaran = 'LEBIH BAYAR';
        }
        $model->save(false);

        //result
        $result['bgColor'] = $bgColor;
        $result['notes'] = $notes;
        $result['totalTagihan'] = $totalTagihan;
        $result['totalPembayaran'] = $totalPembayaran;
        $result['sisa'] = $sisa;
        $result['totalKredit'] = $totalKredit;

        return $result;
    }
}
