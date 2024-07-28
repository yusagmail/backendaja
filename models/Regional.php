<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "regional".
 *
 * @property string $id_regional
 * @property string $nama_regional
 * @property string $id_witel
 */
class Regional extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'regional';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_regional', 'treg', 'id_witel', 'nama_witel', 'datel'], 'required'],
            [['id_regional', 'id_witel'], 'string', 'max' => 20],
            [['treg', 'nama_witel','datel'], 'string', 'max' => 200],
            [['id_witel'], 'unique'],
            [['id_regional'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_regional' => 'Id Regional',
            'treg' => 'Treg',
            'id_witel' => 'Id Witel',
            'nama_witel' => 'Nama Witel',
            'datel' => 'Datel',
        ];
    }
}
