<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "struktur_material".
 *
 * @property int $id_struktur_material
 * @property int $id_material
 * @property int $id_material_kategori1
 * @property int $id_material_kategori2
 * @property int $id_material_kategori3
 * @property int|null $created_id_user
 * @property string|null $created_date
 * @property string|null $created_ip_address
 */
class StrukturMaterial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
     var $id_material_raw_kategori; //Untuk tampungan saja (nanti dimapping ke tabel stukrutral materital item)

    public static function tableName()
    {
        return 'struktur_material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3'], 'required'],
            [['id_struktur_material', 'id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'created_id_user'], 'integer'],
            [['created_date'], 'safe'],
            [['created_ip_address'], 'string', 'max' => 64],
            [['id_struktur_material'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_struktur_material' => 'Id Struktur Material',
            'id_material' => 'Material',
            'id_material_kategori1' => 'Warna',
            'id_material_kategori2' => 'Jenis',
            'id_material_kategori3' => 'Motif',
            'created_id_user' => 'Created Id User',
            'created_date' => 'Created Date',
            'created_ip_address' => 'Created Ip Address',

            'id_material_raw_kategori' => 'Greige',
        ];
    }

    public function getMaterial()
    {
        return $this->hasOne(Material::className(), ['id_material' => 'id_material']);
    }

    public function getMaterialKategori1()
    {
        return $this->hasOne(MaterialKategori1::className(), ['id_material' => 'id_material_kategori1']);
    }

    public function getMaterialKategori2()
    {
        return $this->hasOne(MaterialKategori2::className(), ['id_material' => 'id_material_kategori2']);
    }

    public function getMaterialKategori3()
    {
        return $this->hasOne(MaterialKategori3::className(), ['id_material' => 'id_material_kategori3']);
    }

    public function getListItemTarget(){
        $items = \backend\models\StrukturMaterialItem::find()->where(['id_struktur_material' => $this->id_struktur_material])->all();
        return $items;
    }
}
