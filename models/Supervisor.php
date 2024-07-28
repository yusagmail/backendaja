<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "supervisor".
 *
 * @property int $id_supervisor
 * @property string $nama
 * @property string $nama_lengkap
 * @property int $NIK 
 * @property_int $nomor_telepon
 * @property string $jabatan
 * @property string $id_regional
 * @property string $id_witel
 */
class Supervisor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supervisor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_supervisor', 'nama', 'nama_lengkap', 'NIK','nomor_telepon', 'jabatan', 'id_regional', 'id_witel'], 'required'],
            [['id_supervisor', 'NIK', 'nomor_telepon'], 'integer'],
            [['nama', 'nama_lengkap'], 'string', 'max' => 200],
            [['jabatan'], 'string', 'max' => 100],
            [['id_regional', 'id_witel'], 'string', 'max' => 20],
            [['id_supervisor'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_supervisor' => 'Id Supervisor',
            'nama' => 'Nama',    
            'nama_lengkap' => 'Nama Lengkap',
            'NIK' => 'NIK',
            'nomor_telepon' => 'Nomor Telepon',
            'jabatan' => 'Jabatan',
            'id_regional' => 'Id Regional',
            'id_witel' => 'Id Witel',
        ];
    }
    
public function getRegional()
{
    return $this->hasOne(Regional::className(), ['id_regional' => 'id_regional']);
}
public function getWitel()
{
    return $this->hasOne(Witel::className(), ['id_witel' => 'id_witel']);
}
}
