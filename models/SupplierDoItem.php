<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "supplier_do_item".
 *
 * @property int $id_supplier_do_item
 * @property int $id_supplier_delivery_order
 * @property int $id_material
 * @property string $varian
 * @property int $qty
 * @property double $unit_price
 * @property double $total_price
 * @property string $keterangan
 * @property string $created_date
 * @property int $created_user_id
 * @property string $created_ip_address
 */
class SupplierDoItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier_do_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_supplier_delivery_order', 'id_material', 'qty', 'unit_price', 'total_price'], 'required'],
            [['id_supplier_delivery_order', 'id_material', 'qty', 'created_user_id'], 'integer'],
            [['unit_price', 'total_price'], 'number'],
            [['created_date'], 'safe'],
            [['varian', 'keterangan'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_supplier_do_item' => 'Id Supplier Do Item',
            'id_supplier_delivery_order' => 'Id Supplier Delivery Order',
            'id_material' => 'Id Material',
            'varian' => 'Varian',
            'qty' => 'Qty',
            'unit_price' => 'Unit Price',
            'total_price' => 'Total Price',
            'keterangan' => 'Keterangan',
            'created_date' => 'Created Date',
            'created_user_id' => 'Created User ID',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
