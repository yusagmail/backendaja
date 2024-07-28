<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "basic_packing_item".
 *
 * @property int $id_basic_packing_item
 * @property int $id_basic_packing
 * @property int $id_material_support
 * @property int $jumlah
 * @property string $keterangan
 * @property int $created_id_user
 * @property string $created_date
 * @property string $created_ip_address
 */
class BasicPackingItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'basic_packing_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_basic_packing', 'id_material_support', 'jumlah'], 'required'],
            [['id_basic_packing', 'id_material_support', 'jumlah', 'created_id_user'], 'integer'],
            [['created_date'], 'safe'],
            [['keterangan'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_basic_packing_item' => 'Id Basic Packing Item',
            'id_basic_packing' => 'Id Basic Packing',
            'id_material_support' => 'Id Material Support',
            'jumlah' => 'Jumlah',
            'keterangan' => 'Keterangan',
            'created_id_user' => 'Created Id User',
            'created_date' => 'Created Date',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getMatsup()
    {
        return $this->hasOne(MaterialSupport::className(), ['id_material_support' => 'id_material_support']);
    }

    public function getBasicPacking()
    {
        return $this->hasOne(BasicPacking::className(), ['id_basic_packing' => 'id_basic_packing']);
    }
}
