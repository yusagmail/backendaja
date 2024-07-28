<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "witel".
 *
 * @property string $id_witel
 * @property string $nama_witel
 * @property string $datel
 */
class Witel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'witel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_witel', 'nama_witel', 'datel'], 'required'],
            [['id_witel'], 'string', 'max' => 20],
            [['nama_witel', 'datel'], 'string', 'max' => 200],
            [['id_witel'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_witel' => 'Id Witel',
            'nama_witel' => 'Nama Witel',
            'datel' => 'Datel',
        ];
    }
}
