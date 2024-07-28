<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "material_kategori1".
 *
 * @property int $id_material
 * @property string $kode
 * @property string $nama
 * @property int $is_active
 */
class MaterialKategori1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material_kategori1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'nama'], 'required'],
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
            'id_material' => 'Id Material',
            'kode' => 'Kode',
            'nama' => 'Nama',
            'is_active' => 'Is Active',
        ];
    }

    public function validateDoubleKode($attribute)
    {
        //Di sini ngecek apakah nomor registrasi sudah pernah ada atau belum pernah.
        $reg =  MaterialKategori1::find()
            ->where(['kode' => $this->kode])
            ->one();
        if ($reg != null) {
            if($reg->id_material != $this->id_material){
                $this->addError($attribute, "Kode ini [" . $this->kode."] telah terdaftar di sistem ini. Silakan gunakan kode yang lain!");
            }
            //if ($model->isNewRecord) {
        }
    }
}
