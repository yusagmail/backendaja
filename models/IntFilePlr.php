<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "int_file_plr".
 *
 * @property int $id_int_file_plr
 * @property string $nama_file
 * @property string|null $created_date
 * @property int|null $created_user_id
 * @property string|null $created_ip_address
 */
class IntFilePlr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'int_file_plr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_file'], 'required'],
            [['created_date'], 'safe'],
            [['created_user_id'], 'integer'],
            //[['nama_file'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 64],

            //Maxsize 20 MB
            [['nama_file'], 'file', 'skipOnEmpty' => true, 'extensions'=>'xls, xlsx', 'maxSize' => 20*1024*1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_int_file_plr' => 'Id Int File Plr',
            'nama_file' => 'Nama File',
            'created_date' => 'Created Date',
            'created_user_id' => 'Created User ID',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function uploadFile()
    {
        if ($this->validate()) {
            $uploadedFile = yii\web\UploadedFile::getInstance($this, 'nama_file');
            if (!empty($uploadedFile)) {
                $i = \common\utils\EncryptionDB::encryptor('encrypt',$this->id_int_file_plr);
                $filename = "file-plr-" . $i . '.' . $uploadedFile->extension;
                // $this->attachfile1->saveAs('uploads/' . $this->attachfile1->baseName . '.' . $this->attachfile1->extension);
                //$this->attachFile->saveAs('file/bayar_bukti/' . $filename);

                $this->nama_file = $filename;
                $uploadedFile->saveAs('file/integrasi/plr/' . $filename);

                $this->save(false);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
