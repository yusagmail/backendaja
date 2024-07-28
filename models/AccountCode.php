<?php

namespace backend\models;

/**
 * This is the model class for table "account_code".
 *
 * @property int $id_account_code
 * @property int $id_account_code_parent
 * @property string $account_code
 * @property string $account_name
 */
class AccountCode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account_code';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_account_code_parent', 'account_code', 'account_name'], 'required'],
            [['id_account_code_parent'], 'integer'],
            [['account_code'], 'string', 'max' => 100],
            [['account_name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_account_code' => 'Id Account Code',
            'id_account_code_parent' => 'Id Account Code Parent',
            'account_code' => 'Account Code',
            'account_name' => 'Account Name',
        ];
    }
    public function getAccountCode()
    {
        return $this->hasOne(AccountCode::className(), ['id_account_code_parent' => 'account_name']);
    }
}
