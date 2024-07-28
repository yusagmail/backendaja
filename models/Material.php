<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property string $id_material
 * @property string $kode
 * @property string $nama
 * @property string $deskripsi
 * @property int $created_id_user
 * @property string $created_date
 * @property string $created_ip_address
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode','nama'], 'required'],
            [['created_id_user'], 'integer'],
            [['created_date'], 'safe'],
            [['kode'], 'string', 'max' => 50],
            [['nama'], 'string', 'max' => 250],
            [['deskripsi'], 'string', 'max' => 500],
            [['created_ip_address'], 'string', 'max' => 64],
            [['kode'], 'string', 'min' => 3, 'max' => 8, 'tooShort' => '{attribute} minimal 3 karakter' , 'tooLong' => '{attribute} maksimal 8 karakter' ],
            //['kode', 'unique', 'message' => 'Kode ini sudah ada. Gunakan kode yang lain!'],
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
            'kode' => 'Kode Material',
            'nama' => 'Nama Material',
            'deskripsi' => 'Deskripsi',
            'created_id_user' => 'Created Id User',
            'created_date' => 'Created Date',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function validateDoubleKode($attribute)
    {
        //Di sini ngecek apakah nomor registrasi sudah pernah ada atau belum pernah.
        $reg =  Material::find()
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
