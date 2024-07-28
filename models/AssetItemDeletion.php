<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_item_deletion".
 *
 * @property int $id_asset_item_deletion
 * @property int $id_asset_item
 * @property string $status_deletion
 * @property string $execution_date
 * @property int $execution_month
 * @property int $execution_year
 * @property int $execution_id_user
 * @property string $execution_user
 * @property double $income
 * @property int $id_mst_status_condition
 * @property string $condition_when_deletion
 * @property string $acquisition_by
 * @property string $grant_to
 * @property string $photo1
 * @property string $photo2
 * @property string $notes
 */
class AssetItemDeletion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_item_deletion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item', 'status_deletion', 'execution_date', 'execution_month', 'execution_year', 'id_mst_status_condition', 'photo1', 'photo2'], 'required'],
            [['id_asset_item', 'execution_month', 'execution_year', 'execution_id_user', 'id_mst_status_condition'], 'integer'],
            [['status_deletion'], 'string'],
            [['execution_date'], 'safe'],
            [['income'], 'number'],
            [['execution_user', 'condition_when_deletion', 'acquisition_by', 'grant_to', 'photo1', 'photo2'], 'string', 'max' => 250],
            [['notes'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_item_deletion' => 'Id Asset Item Deletion',
            'id_asset_item' => 'Id Asset Item',
            'status_deletion' => 'Status Deletion',
            'execution_date' => 'Execution Date',
            'execution_month' => 'Execution Month',
            'execution_year' => 'Execution Year',
            'execution_id_user' => 'Execution Id User',
            'execution_user' => 'Execution User',
            'income' => 'Income',
            'id_mst_status_condition' => 'Id Mst Status Condition',
            'condition_when_deletion' => 'Condition When Deletion',
            'acquisition_by' => 'Acquisition By',
            'grant_to' => 'Grant To',
            'photo1' => 'Photo1',
            'photo2' => 'Photo2',
            'notes' => 'Notes',
        ];
    }
    public function getAssetMaster()
    {
        return $this->hasOne(AssetMaster::className(), ['id_asset_master' => 'id_asset_item']);
    }
}
