<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jurnal_type".
 *
 * @property int $id_jurnal_type
 * @property string $type_jurnal
 */
class JurnalType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jurnal_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_jurnal'], 'required'],
            [['type_jurnal'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jurnal_type' => 'Id Jurnal Type',
            'type_jurnal' => 'Type Jurnal',
        ];
    }
}
