<?php

namespace backend\models;

use backend\models\Subcontractor;
use Yii;

/**
 * This is the model class for table "outsourcing_process_raw".
 *
 * @property int $id_outsourcing_process_raw
 * @property string $tanggal_proses
 * @property int $id_subcontractor
 * @property string $nomor_kontrak
 * @property string|null $nomor_surat_jalan
 * @property int|null $month
 * @property int|null $year
 * @property int|null $total_tagihan
 * @property int|null $bayar_total_bayar
 * @property string|null $bayar_cara
 * @property string|null $bayar_tanggal_bayar
 * @property int|null $bayar_id_bank_pembayaran
 * @property string|null $bayar_bukti
 * @property string|null $status_proses
 * @property string|null $status_pembayaran
 * @property int|null $created_id_user
 * @property string|null $created_date
 * @property string|null $created_ip_address
 */
class OutsourcingProcessRaw extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'outsourcing_process_raw';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_proses', 'id_subcontractor', 'nomor_kontrak'], 'required'],
            [['tanggal_proses', 'bayar_tanggal_bayar', 'created_date'], 'safe'],
            [['id_subcontractor', 'month', 'year', 'total_tagihan', 'bayar_total_bayar', 'bayar_id_bank_pembayaran', 'created_id_user'], 'integer'],
            [['bayar_cara', 'status_proses', 'status_pembayaran'], 'string'],
            [['nomor_kontrak', 'nomor_surat_jalan', 'bayar_bukti'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_outsourcing_process_raw' => 'Id Outsourcing Process Raw',
            'tanggal_proses' => 'Tanggal Proses',
            'id_subcontractor' => 'Subcontractor',
            'nomor_kontrak' => 'Nomor Kontrak',
            'nomor_surat_jalan' => 'Nomor Surat Jalan',
            'month' => 'Month',
            'year' => 'Year',
            'total_tagihan' => 'Total Tagihan',
            'bayar_total_bayar' => 'Bayar Total Bayar',
            'bayar_cara' => 'Bayar Cara',
            'bayar_tanggal_bayar' => 'Bayar Tanggal Bayar',
            'bayar_id_bank_pembayaran' => 'Bayar Id Bank Pembayaran',
            'bayar_bukti' => 'Bayar Bukti',
            'status_proses' => 'Status Proses',
            'status_pembayaran' => 'Status Pembayaran',
            'created_id_user' => 'Created Id User',
            'created_date' => 'Created Date',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getSubcontractor()
    {
        return $this->hasOne(Subcontractor::className(), ['id_subcontractor' => 'id_subcontractor']);
    }
}
