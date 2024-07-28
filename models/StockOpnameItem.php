<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "stock_opname_item".
 *
 * @property int $id_stock_opname_item
 * @property int $id_stock_opname
 * @property int $id_material_finish
 * @property int $id_gudang
 * @property string|null $redundat_barcode_code
 * @property string $keterangan
 * @property string $entry_time
 * @property int $created_user_id
 */
class StockOpnameItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock_opname_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_stock_opname', 'id_material_finish', 'id_gudang', 'keterangan', 'entry_time', 'created_user_id'], 'required'],
            [['id_stock_opname', 'id_material_finish', 'id_gudang', 'created_user_id'], 'integer'],
            [['entry_time'], 'safe'],
            [['redundat_barcode_code'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_stock_opname_item' => 'Id Stock Opname Item',
            'id_stock_opname' => 'Id Stock Opname',
            'id_material_finish' => 'Material',
            'id_gudang' => 'Gudang',
            'redundat_barcode_code' => 'Barcode Code',
            'keterangan' => 'Keterangan',
            'entry_time' => 'Entry Time',
            'created_user_id' => 'Created User ID',
        ];
    }



    public function getGudang()
    {
        return $this->hasOne(Gudang::className(), ['id_gudang' => 'id_gudang']);
    }

    public function getMaterialFinish()
    {
        return $this->hasOne(MaterialFinish::className(), ['id_material_finish' => 'id_material_finish']);
    }
}
