<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "akun".
 *
 * @property int $id_akun
 * @property int $id_parent
 * @property string $kode_akun
 * @property string $nama_akun
 * @property string $debet_kredit
 * @property string $kategori
 */
class Akun extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'akun';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_parent', 'kode_akun', 'nama_akun'], 'required'],
            [['id_parent'], 'integer'],
            [['debet_kredit', 'kategori'], 'string'],
            [['kode_akun'], 'string', 'max' => 30],
            [['nama_akun'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_akun' => 'Id Akun',
            'id_parent' => 'Id Parent',
            'kode_akun' => 'Kode Akun',
            'nama_akun' => 'Nama Akun',
            'debet_kredit' => 'Debet Kredit',
            'kategori' => 'Kategori',
        ];
    }
}
