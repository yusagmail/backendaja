<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_item_distribution_log".
 *
 * @property int $id_asset_item_distribution_log
 * @property int $id_asset_item
 * @property string $distribute_to
 * @property int $id_pegawai
 * @property int $from_id_pegawai
 * @property int $id_departement
 * @property int $id_asset_item_location
 * @property string $status
 * @property string $start_date
 * @property int $start_month
 * @property int $start_year
 * @property int $status_distribution
 * @property string $end_date
 * @property int $end_month
 * @property int $end_year
 * @property string $duration
 * @property string $handover_by
 * @property string $handover_condition_notes
 * @property int $id_mst_status_condition
 * @property string $handover_photos1
 * @property string $handover_photos2
 * @property string $notes
 */
class AssetItemDistributionLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_item_distribution_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item', 'from_id_pegawai', 'status', 'status_distribution', 'id_mst_status_condition'], 'required'],
            [['id_asset_item', 'id_pegawai', 'from_id_pegawai', 'id_departement', 'id_asset_item_location', 'start_month', 'start_year', 'status_distribution', 'end_month', 'end_year', 'id_mst_status_condition'], 'integer'],
            [['distribute_to', 'status'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['duration'], 'string', 'max' => 5],
            [['handover_by', 'handover_condition_notes', 'handover_photos1', 'handover_photos2', 'notes'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_item_distribution_log' => 'Id Asset Item Distribution Log',
            'id_asset_item' => 'Id Asset Item',
            'distribute_to' => 'Distribute To',
            'id_pegawai' => 'Id Pegawai',
            'from_id_pegawai' => 'From Id Pegawai',
            'id_departement' => 'Id Departement',
            'id_asset_item_location' => 'Id Asset Item Location',
            'status' => 'Status',
            'start_date' => 'Start Date',
            'start_month' => 'Start Month',
            'start_year' => 'Start Year',
            'status_distribution' => 'Status Distribution',
            'end_date' => 'End Date',
            'end_month' => 'End Month',
            'end_year' => 'End Year',
            'duration' => 'Duration',
            'handover_by' => 'Handover By',
            'handover_condition_notes' => 'Handover Condition Notes',
            'id_mst_status_condition' => 'Id Mst Status Condition',
            'handover_photos1' => 'Handover Photos1',
            'handover_photos2' => 'Handover Photos2',
            'notes' => 'Notes',
        ];
    }
    public function getAssetMaster()
    {
        return $this->hasOne(AssetMaster::className(), ['id_asset_master' => 'id_asset_item']);
    }
}
