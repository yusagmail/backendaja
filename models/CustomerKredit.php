<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customer_kredit".
 *
 * @property int $id_customer_kredit
 * @property int $id_customer
 * @property int $id_sales_order
 * @property int $jumlah_kredit
 * @property string $tanggal
 */
class CustomerKredit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_kredit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_customer', 'id_sales_order', 'jumlah_kredit', 'tanggal'], 'required'],
            [['id_customer', 'id_sales_order', 'jumlah_kredit'], 'integer'],
            [['tanggal'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_customer_kredit' => 'Id Customer Kredit',
            'id_customer' => 'Id Customer',
            'id_sales_order' => 'Id Sales Order',
            'jumlah_kredit' => 'Jumlah Kredit',
            'tanggal' => 'Tanggal',
        ];
    }
}
