<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "material_raw_kategori1".
 *
 * @property int $id_material_raw_kategori
 * @property string $kode
 * @property string|null $nama
 * @property int $is_active
 */
class MaterialRawKategori1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material_raw_kategori1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'nama', 'is_active'], 'required'],
            [['is_active'], 'integer'],
            [['kode'], 'string', 'max' => 50],
            [['nama'], 'string', 'max' => 200],
            [['kode'], 'string', 'min' => 3, 'max' => 3, 'tooShort' => '{attribute} minimal 3 karakter' , 'tooLong' => '{attribute} maksimal 3 karakter' ],
            ['kode', 'validateDoubleKode'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_material_raw_kategori' => 'Id',
            'kode' => 'Kode',
            'nama' => 'Nama',
            'is_active' => 'Status Active',
        ];
    }

    public function validateDoubleKode($attribute)
    {
        //Di sini ngecek apakah nomor registrasi sudah pernah ada atau belum pernah.
        $reg =  MaterialRawKategori1::find()
            ->where(['kode' => $this->kode])
            ->one();
        if ($reg != null) {
            if($reg->id_material_raw_kategori != $this->id_material_raw_kategori){
                $this->addError($attribute, "Kode ini [" . $this->kode."] telah terdaftar di sistem ini. Silakan gunakan kode yang lain!");
            }
        }
    }
}
