<?php

namespace backend\models;

use backend\models\MaterialRawKategori1;
use Yii;

/**
 * This is the model class for table "struktur_material_item".
 *
 * @property int $id_struktur_material_item
 * @property int|null $id_material_raw_kategori
 * @property int|null $created_id_user
 * @property string|null $created_date
 * @property string|null $created_ip_address
 */
class StrukturMaterialItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'struktur_material_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_struktur_material_item', 'id_material_raw_kategori', 'created_id_user'], 'integer'],
            [['created_date'], 'safe'],
            [['created_ip_address'], 'string', 'max' => 64],
            [['id_struktur_material_item'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_struktur_material_item' => 'Id Struktur Material Item',
            'id_struktur_material' => 'Struktur Material',
            'id_material_raw_kategori' => 'Kategori Material',
            'created_id_user' => 'Created Id User',
            'created_date' => 'Created Date',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getStrukturMaterial()
    {
        return $this->hasOne(StrukturMaterial::className(), ['id_struktur_material' => 'id_struktur_material']);
    }

    public function getMaterialRawKategori()
    {
        return $this->hasOne(MaterialRawKategori1::className(), ['id_material_raw_kategori' => 'id_material_raw_kategori']);
    }
}
