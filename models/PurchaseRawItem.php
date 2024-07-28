<?php

namespace backend\models;

use backend\models\MaterialRawKategori1;
use backend\models\PurchaseRaw;
use Yii;

/**
 * This is the model class for table "purchase_raw_item".
 *
 * @property int $id_purchase_raw_item
 * @property int $id_purchase_raw
 * @property int|null $id_material_raw_kategori
 * @property int|null $yard
 * @property int|null $harga
 * @property int|null $created_id_user
 * @property string|null $created_date
 * @property string|null $created_ip_address
 */
class PurchaseRawItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchase_raw_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_purchase_raw'], 'required'],
            [['id_purchase_raw', 'id_material_raw_kategori', 'yard', 'harga', 'created_id_user'], 'integer'],
            [['created_date'], 'safe'],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_purchase_raw_item' => 'Id Purchase Raw Item',
            'id_purchase_raw' => 'Induk',
            'id_material_raw_kategori' => 'Greige',
            'yard' => 'Yard',
            'harga' => 'Harga',
            'created_id_user' => 'Created Id User',
            'created_date' => 'Created Date',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getPurchaseRaw()
    {
        return $this->hasOne(PurchaseRaw::className(), ['id_purchase_raw' => 'id_purchase_raw']);
    }

    public function getMaterialRawKategori()
    {
        return $this->hasOne(MaterialRawKategori1::className(), ['id_material_raw_kategori' => 'id_material_raw_kategori']);
    }
}
