<?php

namespace backend\models;

use backend\models\MaterialRawKategori1;
use Yii;

/**
 * This is the model class for table "outsourcing_process_raw_item".
 *
 * @property int $id_outsourcing_process_raw_item
 * @property int $id_outsourcing_process_raw
 * @property int|null $id_material_raw_kategori
 * @property int|null $yard
 * @property int|null $harga
 * @property int|null $created_id_user
 * @property string|null $created_date
 * @property string|null $created_ip_address
 */
class OutsourcingProcessRawItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'outsourcing_process_raw_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_outsourcing_process_raw'], 'required'],
            [['id_outsourcing_process_raw', 'id_material_raw_kategori', 'yard', 'harga', 'created_id_user'], 'integer'],
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
            'id_outsourcing_process_raw_item' => 'Id Outsourcing Process Raw Item',
            'id_outsourcing_process_raw' => 'Id Outsourcing Process Raw',
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
        return $this->hasOne(OutsourcingProcessRaw::className(), ['id_outsourcing_process_raw' => 'id_outsourcing_process_raw']);
    }

    public function getMaterialRawKategori()
    {
        return $this->hasOne(MaterialRawKategori1::className(), ['id_material_raw_kategori' => 'id_material_raw_kategori']);
    }
}
