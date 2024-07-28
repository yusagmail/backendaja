<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_master_map_year".
 *
 * @property int $id_asset_master_map_year
 * @property int $id_asset_master
 * @property int $year
 * @property int $current_count
 * @property int $total_need
 * @property string $updated_date
 * @property int $updated_user
 * @property string $updated_ip_address
 */
class AssetMasterMapYear extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_master_map_year';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_master', 'year', 'current_count', 'total_need'], 'required'],
            [['id_asset_master', 'year', 'current_count', 'total_need', 'updated_user'], 'integer'],
            [['updated_date'], 'safe'],
            [['updated_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_master_map_year' => 'Id Asset Master Map Year',
            'id_asset_master' => 'Id Asset Master',
            'year' => 'Year',
            'current_count' => 'Current Count',
            'total_need' => 'Total Need',
            'updated_date' => 'Updated Date',
            'updated_user' => 'Updated User',
            'updated_ip_address' => 'Updated Ip Address',
        ];
    }
}
