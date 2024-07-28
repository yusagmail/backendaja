<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "picking_list".
 *
 * @property int $id_picking_list
 * @property int|null $id_customer
 * @property string $customer_name
 * @property string $customer_delivery_name
 * @property string $customer_city
 * @property string $picking_route
 * @property string|null $sales_order_number
 * @property int $id_sales_order
 * @property string $activation_date
 * @property string|null $delivery_date
 * @property string $requisition
 */
class PickingList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'picking_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_customer', 'id_sales_order'], 'integer'],
            [['customer_name', 'customer_delivery_name', 'customer_city', 'picking_route', 'id_sales_order', 'activation_date', 'requisition'], 'required'],
            [['activation_date', 'delivery_date'], 'safe'],
            [['customer_name', 'customer_delivery_name', 'customer_city', 'picking_route', 'requisition'], 'string', 'max' => 250],
            [['sales_order_number'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_picking_list' => 'Id Picking List',
            'id_customer' => 'Id Customer',
            'customer_name' => 'Customer Name',
            'customer_delivery_name' => 'Customer Delivery Name',
            'customer_city' => 'Customer City',
            'picking_route' => 'Picking Route',
            'sales_order_number' => 'Sales Order Number',
            'id_sales_order' => 'Id Sales Order',
            'activation_date' => 'Activation Date',
            'delivery_date' => 'Delivery Date',
            'requisition' => 'Requisition',
        ];
    }
}
