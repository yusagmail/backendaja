<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customer_kredit_bayar".
 *
 * @property int $id_customer_kredit_bayar
 * @property int $id_customer
 * @property string $tanggal_bayar
 * @property string $cara_bayar
 * @property int $jumlah_bayar
 * @property int|null $id_bank_pembayaran
 * @property int|null $id_sales_order
 * @property string $status_pembayaran
 * @property string|null $created_date
 * @property int|null $created_user_id
 * @property string|null $created_ip_address
 */
class CustomerKreditBayar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_kredit_bayar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_customer', 'tanggal_bayar', 'cara_bayar', 'jumlah_bayar', 'status_pembayaran'], 'required'],
            [['id_customer', 'jumlah_bayar', 'id_bank_pembayaran', 'id_sales_order', 'created_user_id'], 'integer'],
            [['tanggal_bayar', 'created_date'], 'safe'],
            [['cara_bayar', 'status_pembayaran'], 'string'],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_customer_kredit_bayar' => 'Id Customer Kredit Bayar',
            'id_customer' => 'Id Customer',
            'tanggal_bayar' => 'Tanggal Bayar',
            'cara_bayar' => 'Cara Bayar',
            'jumlah_bayar' => 'Jumlah Bayar',
            'id_bank_pembayaran' => 'Id Bank Pembayaran',
            'id_sales_order' => 'Id Sales Order',
            'status_pembayaran' => 'Status Pembayaran',
            'created_date' => 'Created Date',
            'created_user_id' => 'Created User ID',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
