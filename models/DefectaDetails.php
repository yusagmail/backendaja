<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "defecta_details".
 *
 * @property int $id_defecta_detail
 * @property int|null $id_defecta
 * @property int|null $id_asset_item
 * @property string|null $satuan
 * @property int|null $sisa
 * @property int|null $pemakaian_sebulan
 * @property int|null $kebutuhan
 * @property string|null $keterangan
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class DefectaDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'defecta_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_defecta','id_asset_master', 'sisa', 'pemakaian_sebulan', 'kebutuhan'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['satuan', 'keterangan'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_defecta_detail' => 'Id Defecta Detail',
            'id_defecta' => 'Id Defecta',
            'id_asset_master' => 'Id Asset Master',
            'satuan' => 'Satuan',
            'sisa' => 'Sisa',
            'pemakaian_sebulan' => 'Pemakaian Sebulan',
            'kebutuhan' => 'Kebutuhan',
            'keterangan' => 'Keterangan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getAssetMaster()
    {
        return $this->hasOne(AssetMaster::className(), ['id_asset_master' => 'id_asset_master']);
    }
}
