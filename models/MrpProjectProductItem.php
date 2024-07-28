<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mrp_project_product_item".
 *
 * @property int $id_mrp_project_product_item
 * @property int $id_mrp_project
 * @property int $id_mst_product_component
 * @property string|null $plan_start_date
 * @property string|null $plan_end_date
 * @property string|null $actual_start_date
 * @property string|null $actual_end_date
 */
class MrpProjectProductItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    var $total_quantity;

    public static function tableName()
    {
        return 'mrp_project_product_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mrp_project', 'id_mst_product_component', 'quantity'], 'required'],
            [['id_mrp_project', 'id_mst_product_component'], 'integer'],
            [['plan_start_date', 'plan_end_date', 'actual_start_date', 'actual_end_date','quantity'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mrp_project_product_item' => 'Id Mrp Project Product Item',
            'id_mrp_project' => 'Id Mrp Project',
            'id_mst_product_component' => 'Product',
            'plan_start_date' => 'Plan Start Date',
            'plan_end_date' => 'Plan End Date',
            'actual_start_date' => 'Actual Start Date',
            'actual_end_date' => 'Actual End Date',
        ];
    }

    public function getFinalProduct()
    {
        return $this->hasOne(MstProductComponent::className(), ['id_mst_product_component' => 'id_mst_product_component']);
    }
}
