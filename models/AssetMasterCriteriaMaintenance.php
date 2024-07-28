<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_master_criteria_maintenance".
 *
 * @property int $id_asset_master_criteria_maintenance
 * @property int $id_asset_master
 * @property string $criteria
 * @property int $type_criteria
 * @property double $periodic_value
 * @property int $metric
 * @property string $notes
 */
class AssetMasterCriteriaMaintenance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_master_criteria_maintenance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_master', 'criteria', 'type_criteria', 'periodic_value', 'metric'], 'required'],
            [['id_asset_master', 'type_criteria', 'metric'], 'integer'],
            [['periodic_value'], 'number'],
            [['criteria'], 'string', 'max' => 200],
            [['notes'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_master_criteria_maintenance' => 'Id Asset Master Criteria Maintenance',
            'id_asset_master' => 'Id Asset Master',
            'criteria' => 'Criteria',
            'type_criteria' => 'Type Criteria',
            'periodic_value' => 'Periodic Value',
            'metric' => 'Metric',
            'notes' => 'Notes',
        ];
    }
    public function getAssetMaster()
    {
        return $this->hasOne(AssetMaster::className(), ['id_asset_master' => 'id_asset_master']);
    }
}
