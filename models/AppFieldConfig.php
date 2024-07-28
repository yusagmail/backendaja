<?php

namespace backend\models;

use common\helpers\TypeFieldEnum;

/**
 * This is the model class for table "app_field_config".
 *
 * @property int $id_app_field_config
 * @property string $classname
 * @property string $varian_group
 * @property string $fieldname
 * @property string $label
 * @property int $no_order
 * @property int $is_visible
 * @property int $is_required
 * @property int $is_unique
 * @property int $is_safe
 * @property int $type_field
 * @property int $max_field
 * @property string $default_value
 * @property int $hide_in_grid
 * @property string $pattern
 * @property string $image_extensions
 * @property string $image_max_size
 */
class AppFieldConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_field_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['classname', 'varian_group', 'fieldname', 'label', 'no_order', 'is_visible', 'is_required', 'max_field', 'hide_in_grid', 'image_extensions', 'image_max_size'], 'required'],
            [['no_order', 'is_visible', 'is_required', 'is_unique', 'is_safe', 'type_field', 'max_field', 'hide_in_grid'], 'integer'],
            [['classname', 'fieldname', 'label', 'default_value', 'pattern', 'image_extensions', 'image_max_size'], 'string', 'max' => 250],
            [['varian_group'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_app_field_config' => 'Id App Field Config',
            'classname' => 'Classname',
            'varian_group' => 'Varian Group',
            'fieldname' => 'Fieldname',
            'label' => 'Label',
            'no_order' => 'No Order',
            'is_visible' => 'Is Visible',
            'is_required' => 'Is Required',
            'is_unique' => 'Is Unique',
            'is_safe' => 'Is Safe',
            'type_field' => 'Type Field',
            'max_field' => 'Max Field',
            'default_value' => 'Default Value',
            'hide_in_grid' => 'Hide In Grid',
            'pattern' => 'Pattern',
            'image_extensions' => 'Image Extensions',
            'image_max_size' => 'Image Max Size',
        ];
    }

    public function getTypeFieldConfig(){
        $list = TypeFieldEnum::$list;
        return array_key_exists($this->type_field, $list) ? $list[$this->type_field] : 'Undefined';
    }
}
