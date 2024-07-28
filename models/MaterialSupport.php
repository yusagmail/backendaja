<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "material_support".
 *
 * @property int $id_material_support
 * @property string|null $kode
 * @property string $nama
 * @property string|null $deskripsi
 */
class MaterialSupport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material_support';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['kode'], 'string', 'max' => 50],
            [['nama', 'deskripsi'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_material_support' => 'Id Material Support',
            'kode' => 'Kode',
            'nama' => 'Nama',
            'deskripsi' => 'Deskripsi',
        ];
    }
}
