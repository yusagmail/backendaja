<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property int $id_supplier
 * @property string $nama_supplier
 * @property string $alamat_supplier
 * @property string $pic_nama
 * @property int $no_phone
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_supplier', 'alamat_supplier', 'pic_nama', 'no_phone'], 'required'],
            [['no_phone'], 'integer'],
            [['nama_supplier', 'alamat_supplier', 'pic_nama'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_supplier' => 'Id Supplier',
            'nama_supplier' => 'Nama Supplier',
            'alamat_supplier' => 'Alamat Supplier',
            'pic_nama' => 'Pic Nama',
            'no_phone' => 'No Phone',
        ];
    }
}
