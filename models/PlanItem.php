<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "plan_item".
 *
 * @property int $id_plan_item
 * @property int|null $id_plan
 * @property int|null $id_defecta_details
 *  @property int|null $id_mst_satuan
 * @property int|null $stok
 * @property int|null $cost
 * @property int|null $total_cost
 * @property int|null $sales
 * @property int|null $total_sales
 * @property string $created_at
 * @property string $updated_at
 */
class PlanItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_plan', 'id_defecta_details', 'stok', 'cost', 'total_cost', 'sales', 'total_sales'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_plan_item' => 'Id Plan Item',
            'id_plan' => 'Id Plan',
            'id_defecta_details' => 'Id Defecta Details',
            'stok' => 'Stok',
            'cost' => 'Cost',
            'total_cost' => 'Total Cost',
            'sales' => 'Sales',
            'total_sales' => 'Total Sales',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getDefectaDetails()
    {
        return $this->hasOne(DefectaDetails::className(), ['id_defecta_detail' => 'id_defecta_details'])->with('assetMaster');
    }
    public function getAssetMaster()
    {
        return $this->hasOne(AssetMaster::className(), ['id_asset_master' => 'id_asset_master']);
    }
    public function getMstSatuan()
    {
        return $this->hasOne(MstSatuan::className(), ['id_mst_satuan' => 'id_mst_satuan']);
    }
}
