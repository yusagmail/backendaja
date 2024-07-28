<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "stock_opname".
 *
 * @property int $id_stock_opname
 * @property string $tanggal_stock_opname
 * @property string $nama_kegiatan
 * @property string|null $keterangan
 * @property string|null $created_date
 * @property int|null $created_user_id
 * @property string|null $created_ip_address
 */
class StockOpname extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock_opname';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_stock_opname', 'nama_kegiatan'], 'required'],
            [['tanggal_stock_opname', 'created_date'], 'safe'],
            [['created_user_id'], 'integer'],
            [['nama_kegiatan', 'keterangan'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_stock_opname' => 'Id Stock Opname',
            'tanggal_stock_opname' => 'Tanggal Stock Opname',
            'nama_kegiatan' => 'Nama Kegiatan',
            'keterangan' => 'Keterangan',
            'created_date' => 'Created Date',
            'created_user_id' => 'Created User ID',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
