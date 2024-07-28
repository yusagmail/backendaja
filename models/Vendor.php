<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Vendor".
 *
 * @property string $id_vendor
 * @property string $name
 * @property string $company
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $country
 * @property string $email_address
 * @property string $phone_number
 * @property int $id_type_of_vendor
 * @property string $created_date
 * @property string $created_time
 * @property string $created_ip_address
 * @property int $created_id_user
 * @property int $id_user
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'company', 'address', 'city', 'state', 'zip', 'country', 'email_address', 'phone_number', 'id_type_of_vendor'], 'required'],
            [['id_type_of_vendor', 'created_id_user', 'id_user'], 'integer'],
            [['created_date', 'created_time'], 'safe'],
            [['name', 'address', 'email_address'], 'string', 'max' => 250],
            [['company', 'zip'], 'string', 'max' => 200],
            [['city', 'state', 'country', 'phone_number'], 'string', 'max' => 150],
            [['created_ip_address'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_vendor' => 'Id Vendor',
            'name' => 'Company Name',
            'company' => 'Parent Group',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'zip' => 'Zip',
            'country' => 'Country',
            'email_address' => 'Email Address',
            'phone_number' => 'Phone Number',
            'id_type_of_vendor' => 'Type Of Vendor',
            'created_date' => 'Created Date',
            'created_time' => 'Created Time',
            'created_ip_address' => 'Created Ip Address',
            'created_id_user' => 'Created Id User',
            'id_user' => 'Id User',
        ];
    }

    public function getTypeOfVendor()
    {
        return $this->hasOne(TypeOfVendor::className(), ['id_type_of_vendor' => 'id_type_of_vendor']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
