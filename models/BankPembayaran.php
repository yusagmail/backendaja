<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bank_pembayaran".
 *
 * @property int $id_bank_pembayaran
 * @property string $nama_bank
 * @property string $nama_bank_short
 * @property string $nomor_rekening
 * @property string $atas_nama
 * @property string $kode
 */
class BankPembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank_pembayaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_bank', 'nama_bank_short', 'nomor_rekening', 'atas_nama', 'kode'], 'required'],
            [['nama_bank', 'atas_nama'], 'string', 'max' => 250],
            [['nama_bank_short'], 'string', 'max' => 20],
            [['nomor_rekening', 'kode'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bank_pembayaran' => 'Id Bank Pembayaran',
            'nama_bank' => 'Nama Bank',
            'nama_bank_short' => 'Nama Bank Short',
            'nomor_rekening' => 'Nomor Rekening',
            'atas_nama' => 'Atas Nama',
            'kode' => 'Kode',
        ];
    }
}
