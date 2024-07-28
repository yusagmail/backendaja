<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "auth_role_name".
 *
 * @property int $id_auth_role_name
 * @property string $auth_item_name
 * @property string $role_name
 */
class AuthRoleName extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth_role_name';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auth_item_name', 'role_name', 'as_generic_choice'], 'required'],
            [['auth_item_name'], 'string', 'max' => 64],
            [['auth_item_name'], 'unique'],
            [['is_active'], 'integer'],
            [['role_name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_auth_role_name' => 'Id Auth Role Name',
            'auth_item_name' => 'Auth Item Name',
            'role_name' => 'Role Name',
            'as_generic_choice' => 'Generik?',
            'is_active' => 'Aktif?',
        ];
    }

    public function getAsGenericChoice()
    {
        if ($this->as_generic_choice == 1) {
            return 'YA';
        } else {
            return "TIDAK";
        }
    }

    public function getIsActive()
    {
        if ($this->is_active == 1) {
            return 'YA';
        } else {
            return "TIDAK";
        }
    }
}
