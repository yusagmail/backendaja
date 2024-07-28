<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "base_pendapatan".
 *
 * @property int $id_base_pendapatan
 * @property string $type_pendapatan
 * @property int $base
 */
class BasePendapatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'base_pendapatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_pendapatan', 'base'], 'required'],
            [['base'], 'integer'],
            [['type_pendapatan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_base_pendapatan' => 'Id Base Pendapatan',
            'type_pendapatan' => 'Type Pendapatan',
            'base' => 'Base',
        ];
    }
}
