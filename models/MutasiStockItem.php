<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mutasi_stock_item".
 *
 * @property int $id_mutasi_stock_item
 * @property int $id_mutasi_stock
 * @property int $id_material_finish
 * @property string|null $keterangan
 */
class MutasiStockItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mutasi_stock_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mutasi_stock', 'id_material_finish'], 'required'],
            [['id_mutasi_stock', 'id_material_finish'], 'integer'],
            [['keterangan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mutasi_stock_item' => 'Mutasi Stock Item',
            'id_mutasi_stock' => 'Mutasi Stock',
            'id_material_finish' => 'Barang Jadi',
            'keterangan' => 'Keterangan',
        ];
    }

    public function getMaterialFinish()
    {
        return $this->hasOne(MaterialFinish::className(), ['id_material_finish' => 'id_material_finish']);
    }

    public function getMutasiStock()
    {
        return $this->hasOne(MutasiStock::className(), ['id_mutasi_stock' => 'id_mutasi_stock']);
    }
}
