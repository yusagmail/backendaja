<?php

namespace backend\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "kabupaten".
 *
 * @property int $id_kabupaten
 * @property int $id_propinsi
 * @property string $nama_kabupaten
 */
class Kabupaten extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kabupaten';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_propinsi', 'nama_kabupaten'], 'required'],
            [['id_propinsi'], 'integer'],
            [['nama_kabupaten'], 'string', 'max' => 250],
            [['id_propinsi'], 'exist', 'skipOnError' => true, 'targetClass' => Propinsi::className(), 'targetAttribute' => ['id_propinsi' => 'id_propinsi']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kabupaten' => 'Id Kabupaten',
            'id_propinsi' => 'Nama Propinsi',
            'nama_kabupaten' => 'Nama Kabupaten',
        ];
    }

    // public function getProvinsi()
    // {
    //     return $this->hasOne(Propinsi::className(), ['id_propinsi' => 'id_propinsi']);
    // } 
    
    // public function getKecamatan()
    // {
    //     return $this->hasOne(Kecamatan::className(), ['id_kabupaten' => 'id_kabupaten']);
    // }

    public function getProvinsi()
    {
        return $this->hasOne(Propinsi::className(), ['id_propinsi' => 'id_propinsi']);
    }

    /**
     * Gets query for [[Kecamatans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan()
    {
        return $this->hasMany(Kecamatan::className(), ['id_kabupaten' => 'id_kabupaten']);
    }
    
}
