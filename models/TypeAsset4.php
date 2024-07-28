<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "type_asset4".
 *
 * @property int $id_type_asset
 * @property string $type_asset
 * @property string|null $description
 * @property int $is_active
 */
class TypeAsset4 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_asset4';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_asset'], 'required'],
            [['description'], 'string'],
            [['is_active'], 'integer'],
            [['type_asset'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_type_asset' => 'Id Type Asset',
            'type_asset' => 'Type Asset',
            'description' => 'Description',
            'is_active' => 'Is Active',
        ];
    }
}
