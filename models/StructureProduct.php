<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "structure_product".
 *
 * @property int $id_structure_product
 * @property int $result_id_mst_product_component
 * @property int $id_mrp_project
 * @property int $level
 * @property int $id_job
 * @property float $duration
 * @property string|null $remarks
 */
class StructureProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'structure_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_structure_product', 'result_id_mst_product_component', 'id_mrp_project', 'level', 'id_job', 'duration'], 'required'],
            [['id_structure_product', 'result_id_mst_product_component', 'id_mrp_project', 'level', 'id_job'], 'integer'],
            [['duration'], 'number'],
            [['remarks'], 'string', 'max' => 250],
            [['id_structure_product'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_structure_product' => 'Id Structure Product',
            'result_id_mst_product_component' => 'Result Id Mst Product Component',
            'id_mrp_project' => 'Id Mrp Project',
            'level' => 'Level',
            'id_job' => 'Id Job',
            'duration' => 'Duration',
            'remarks' => 'Remarks',
        ];
    }

    public function getFinalProduct()
    {
        return $this->hasOne(MstProductComponent::className(), ['id_mst_product_component' => 'result_id_mst_product_component']);
    }
}
