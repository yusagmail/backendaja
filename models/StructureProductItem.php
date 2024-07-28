<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "structure_product_item".
 *
 * @property int $id_structure_product_item
 * @property int $id_structure_product
 * @property int $item_id_mst_product_component
 * @property int $quantity
 * @property int $id_satuan
 */
class StructureProductItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'structure_product_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_structure_product', 'item_id_mst_product_component', 'quantity', 'id_satuan'], 'required'],
            [['id_structure_product', 'item_id_mst_product_component', 'quantity', 'id_satuan'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_structure_product_item' => 'Id Structure Product Item',
            'id_structure_product' => 'Id Structure Product',
            'item_id_mst_product_component' => 'Item Id Mst Product Component',
            'quantity' => 'Quantity',
            'id_satuan' => 'Id Satuan',
        ];
    }
}
