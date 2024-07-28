<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "app_entity_config".
 *
 * @property int $id_app_entity_config
 * @property string $entity
 * @property string $setting_name
 * @property string $value
 */
class AppEntityConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_entity_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entity', 'setting_name', 'value'], 'required'],
            [['entity'], 'string', 'max' => 150],
            [['setting_name', 'value'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_app_entity_config' => 'Id App Entity Config',
            'entity' => 'Entity',
            'setting_name' => 'Setting Name',
            'value' => 'Value',
        ];
    }
}
