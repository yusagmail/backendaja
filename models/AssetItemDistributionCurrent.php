<?php

namespace backend\models;

/**
 * This is the model class for table "asset_item_distribution_current".
 *
 * @property int $id_asset_item_distribution_current
 * @property int $id_asset_item
 * @property string $distribute_to
 * @property int $id_pegawai
 * @property int $id_departement
 * @property int $id_asset_item_location
 * @property string $status
 * @property string $start_date
 * @property int $start_month
 * @property int $start_year
 * @property string $duration
 * @property string $handover_by
 * @property string $handover_condition_notes
 * @property int $id_mst_status_condition
 * @property string $handover_photos1
 * @property string $handover_photos2
 * @property string $notes
 */
class AssetItemDistributionCurrent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_item_distribution_current';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item', 'status', 'id_mst_status_condition'], 'required'],
            [['id_asset_item_distribution_current', 'id_asset_item', 'id_pegawai', 'id_departement', 'id_asset_item_location', 'start_month', 'start_year', 'id_mst_status_condition'], 'integer'],
            [['distribute_to', 'status'], 'string'],
            [['start_date'], 'safe'],
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
            'id_asset_item_distribution_current' => 'Id Asset Item Distribution Current',
            'id_asset_item' => 'Id Asset Item',
            'distribute_to' => 'Diserahkan Kepada Pihak',
            'id_pegawai' => 'Id Pegawai',
            'id_departement' => 'Id Departement',
            'id_asset_item_location' => 'Id Asset Item Location',
            'status' => 'Status',
            'start_date' => 'Tanggal Penyerahan',
            'start_month' => 'Start Month',
            'start_year' => 'Start Year',
            'duration' => 'Durasi Penggunaan',
            'handover_by' => 'Diserahkan Oleh',
            'handover_condition_notes' => 'Catatan Saat Penyerahan',
            'id_mst_status_condition' => 'Kondisi Saat Penyerahan',
            'handover_photos1' => 'Foto Serah Terima 1',
            'handover_photos2' => 'Foto Serah Terima 2',
            'notes' => 'Keterangan',
        ];
    }
    public function getAssetMaster()
    {
        return $this->hasOne(AssetMaster::className(), ['id_asset_master' => 'id_asset_item']);
    }
    public function getPegawai()
    {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }
    public function getDepartment()
    {
        return $this->hasOne(Departement::className(), ['id_departement' => 'id_departement']);
    }
    public function getLocation()
    {
        return $this->hasOne(AssetItemLocation::className(), ['id_asset_item_location' => 'id_asset_item_location']);
    }
    public function getCondition()
    {
        return $this->hasOne(MstStatusCondition::className(), ['id_mst_status_condition' => 'id_mst_status_condition']);
    }
}
