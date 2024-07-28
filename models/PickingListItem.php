<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "picking_list_item".
 *
 * @property int $id_picking_list_item
 * @property int $id_picking_list
 * @property string $item_id
 * @property string $item_name
 * @property string $size
 * @property string $location
 * @property int|null $id_gudang
 * @property int $qty
 * @property string $unit
 * @property string|null $created_date
 * @property int|null $created_user_id
 * @property string|null $created_ip_address
 */
class PickingListItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'picking_list_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_picking_list', 'item_id', 'item_name', 'size', 'location', 'qty', 'unit'], 'required'],
            [['id_picking_list', 'id_gudang', 'qty', 'created_user_id'], 'integer'],
            [['created_date'], 'safe'],
            [['item_id', 'unit'], 'string', 'max' => 100],
            [['item_name'], 'string', 'max' => 250],
            [['size', 'location'], 'string', 'max' => 200],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_picking_list_item' => 'Id Picking List Item',
            'id_picking_list' => 'Id Picking List',
            'item_id' => 'Item ID',
            'item_name' => 'Item Name',
            'size' => 'Size',
            'location' => 'Location',
            'id_gudang' => 'Id Gudang',
            'qty' => 'Qty',
            'unit' => 'Unit',
            'created_date' => 'Created Date',
            'created_user_id' => 'Created User ID',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
