<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_outlet".
 *
 * @property int $id_user_outlet
 * @property int $id_user
 * @property int $id_outlet_penjualan
 * @property string|null $created_date
 * @property int|null $created_user_id
 * @property string|null $created_ip_address
 */
class UserOutlet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_outlet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_outlet_penjualan'], 'required'],
            [['id_user', 'id_outlet_penjualan', 'created_user_id'], 'integer'],
            [['created_date'], 'safe'],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user_outlet' => 'Id User Outlet',
            'id_user' => 'Id User',
            'id_outlet_penjualan' => 'Id Outlet Penjualan',
            'created_date' => 'Created Date',
            'created_user_id' => 'Created User ID',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getOutlet()
    {
        return $this->hasOne(OutletPenjualan::className(), ['id_outlet_penjualan' => 'id_outlet_penjualan']);
    }
}
