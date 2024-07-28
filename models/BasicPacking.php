<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "basic_packing".
 *
 * @property string $id_basic_packing
 * @property string $nama
 * @property string $deskripsi
 */
class BasicPacking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'basic_packing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama', 'deskripsi'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_basic_packing' => 'Id Basic Packing',
            'nama' => 'Nama',
            'deskripsi' => 'Deskripsi',
        ];
    }
}
