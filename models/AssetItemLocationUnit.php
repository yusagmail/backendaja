<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_item_location_unit".
 *
 * @property int $id_asset_item_location_unit
 * @property int $id_asset_master
 * @property int $id_asset_item
 * @property int $id_location
 * @property int $id_location_unit
 * @property string $keterangan
 */
class AssetItemLocationUnit extends \yii\db\ActiveRecord
{
    // Virtual attributes
    public $bangunan;
    public $lantai;
    public $number3;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_item_location_unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_master', 'id_asset_item', 'id_location', 'id_location_unit'], 'required'],
            [['id_asset_master', 'id_asset_item', 'id_location', 'id_location_unit'], 'integer'],
            [['keterangan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_item_location_unit' => 'ID Asset Item Location Unit',
            'id_asset_master' => 'Asset Master',
            'id_asset_item' => 'Asset Item',
            'id_location' => 'Location',
            'id_location_unit' => 'Location Unit',
            'keterangan' => 'Keterangan',
            'bangunan' => 'Bangunan',
            'lantai' => 'Lantai',
            'id_location_unit_parent' => 'Parent Unit',
        ];
    }

    /**
     * Gets query for [[AssetMaster]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssetMaster()
    {
        return $this->hasOne(AssetMaster::className(), ['id_asset_master' => 'id_asset_master']);
    }

    /**
     * Gets query for [[AssetItem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssetItem()
    {
        return $this->hasOne(AssetItem::className(), ['id_asset_item' => 'id_asset_item']);
    }

    /**
     * Gets query for [[Location]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id_location' => 'id_location']);
    }

    /**
     * Gets query for [[LocationUnit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocationUnit()
    {
        return $this->hasOne(LocationUnit::className(), ['id_location_unit' => 'id_location_unit']);
    }

    public function actionGetLantai($bangunanId)
    {
        $lantai = LocationUnit::find()
            ->where(['id_location_unit_parent' => $bangunanId])
            ->all();

        $result = [];
        foreach ($lantai as $unit) {
            $result[] = ['id_location_unit' => $unit->id_location_unit, 'unit_name' => $unit->unit_name, 'id' => $unit->id];
        }

        return $this->asJson($result);
    }

    public function actionGetRuang($lantaiId)
    {
        $ruang = LocationUnit::find()
            ->where(['id_location_unit_parent' => $lantaiId])
            ->all();

        $result = [];
        foreach ($ruang as $unit) {
            $result[] = ['id_location_unit' => $unit->id_location_unit, 'unit_name' => $unit->unit_name, 'id' => $unit->id];
        }

        return $this->asJson($result);
    }

    public function getBangunan()
    {
        $parent = $this->locationUnit->parent;
        while ($parent && $parent->id_location_unit_parent != 0) {
            $parent = $parent->parent;
        }
        return $parent ? $parent->id_location_unit : null;
    }

    public function getLantai()
    {
        $parent = $this->locationUnit->parent;
        if ($parent && $parent->id_location_unit_parent != 0) {
            return $parent->id_location_unit;
        }
        return null;
    }

    public function getRuang()
    {
        return $this->id_location_unit;
    }
}
