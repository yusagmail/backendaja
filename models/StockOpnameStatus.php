<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "stock_opname_status".
 *
 * @property int $id_stock_opname_status
 * @property int $id_stock_opname
 * @property int $id_gudang
 * @property string $status
 * @property string $tgl_dibuat
 * @property string $waktu_mulai
 * @property string $waktu_terakhir
 * @property string|null $created_date
 * @property int|null $created_user_id
 * @property string|null $created_ip_address
 * @property string|null $modified_date
 * @property int|null $modified_id_user
 * @property string|null $modified_ip_address
 */
class StockOpnameStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock_opname_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_stock_opname', 'id_gudang', 'tgl_dibuat', 'waktu_mulai', 'waktu_terakhir'], 'required'],
            [['id_stock_opname', 'id_gudang', 'created_user_id', 'modified_id_user'], 'integer'],
            [['status'], 'string'],
            [['tgl_dibuat', 'waktu_mulai', 'waktu_terakhir', 'created_date', 'modified_date'], 'safe'],
            [['created_ip_address', 'modified_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_stock_opname_status' => 'Id Stock Opname Status',
            'id_stock_opname' => 'Id Stock Opname',
            'id_gudang' => 'Id Gudang',
            'status' => 'Status',
            'tgl_dibuat' => 'Tgl Dibuat',
            'waktu_mulai' => 'Waktu Mulai',
            'waktu_terakhir' => 'Waktu Terakhir',
            'created_date' => 'Created Date',
            'created_user_id' => 'Created User ID',
            'created_ip_address' => 'Created Ip Address',
            'modified_date' => 'Modified Date',
            'modified_id_user' => 'Modified Id User',
            'modified_ip_address' => 'Modified Ip Address',
        ];
    }
}
