<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "type_of_vendor".
 *
 * @property int $id_type_of_vendor
 * @property string $type_of_vendor
 * @property string $description
 */
class TypeOfVendor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_of_vendor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_of_vendor'], 'required'],
            [['type_of_vendor'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_type_of_vendor' => 'Id Type Of Vendor',
            'type_of_vendor' => 'Type Of Vendor',
            'description' => 'Description',
        ];
    }
}
