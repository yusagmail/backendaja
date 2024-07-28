<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property string $user_level
 * @property integer $role
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
//class User extends \yii\db\ActiveRecord
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const ROLE_USER = 10; // Role Type = User ( bebas sih, ini mah contoh )
    const ROLE_ADMIN = 20; // Admin
    const ROLE_OWNER = 30; // Owner

    const SCENARIO_UPDATE = 'update';

    public $password;

    public $new_password;
    public $repeat_password;
    public $previous_password;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
        // Settingan untuk SQL Server
        //return 'user_system';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
//            'class' => TimestampBehavior::className(),
//            'createdAtAttribute' => 'create_time',
//            'updatedAtAttribute' => 'update_time',
//            'value' => new Expression('NOW()'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'username', 'email', 'password'], 'required'],
            [['full_name', 'username', 'email'], 'required', 'on' => self::SCENARIO_UPDATE],
            [['user_level'], 'string'],
            [['full_name', 'username', 'password'], 'string', 'max' => 250],
            [['email', 'password_reset_token'], 'string', 'max' => 500],
            [['username'], 'unique'],
            [['email'], 'email'],
            [['username', 'email'], 'trim'],
            [['role', 'status'], 'default', 'value' => 10],
            ['role', 'in', 'range' => [self::ROLE_USER, self::ROLE_OWNER, self::ROLE_ADMIN]],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_UPDATE] = ['full_name', 'username', 'email', 'user_level'];

        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'username' => 'Username',
            'email' => 'Email Address',
            'password' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'user_level' => 'User Level',
//            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'role' => 'Role',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }



    public static function findIdentity($id)
    {
        //return static::findOne($id);
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
        // return static::findOne(['username' => $username]);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int)end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getNameOfStatus()
    {
        return ($this->status == 10) ? 'ACTIVE' : 'INACTIVE';
    }

    public function getNameOfRole()
    {
        if ($this->role == self::ROLE_USER) {
            return 'User';
        } elseif ($this->role == self::ROLE_ADMIN) {
            return 'Admin';
        } elseif ($this->role == self::ROLE_OWNER) {
            return 'Owner';
        } else {
            return 'Not Set';
        }
//        return ($this->role == 10) ? 'User Admin' : 'Not Set';
    }

    //Mendapatkan informasi Outlet Penjulana untuk role sales tetapi untuk diakses di Individu
    public static function getOutletPenjualan()
    {
        //return static::findOne($id);
        $level = Yii::$app->user->identity->user_level;
        $uid = Yii::$app->user->identity->id;
        if($level == "sales"){
            $useroutlet = UserOutlet::find()->where(['id_user' => $uid])->one();
            if($useroutlet != null){
                return $useroutlet;
            }else{
                return new UserOutlet();
            }
        }

        return new UserOutlet();
    }

    public function getOutletPenjualanInduk()
    {
        //return static::findOne($id);
        $level = $this->user_level;
        if($level == "sales"){
            $useroutlet = UserOutlet::find()->where(['id_user' => $this->id])->one();
            if($useroutlet != null){
                return $useroutlet->outlet;
            }else{
                return new OutletPenjualan();
            }
        }

        return new OutletPenjualan();
    }

    public static function getGudang()
    {
        //return static::findOne($id);
        $level = Yii::$app->user->identity->user_level;
        $uid = Yii::$app->user->identity->id;
        if($level == "warehouse"){
            $usergudang = UserGudang::find()->where(['id_user' => $uid])->one();
            if($usergudang != null){
                return $usergudang;
            }else{
                return new UserOutlet();
            }
        }

        return new Gudang();
    }

    public function getGudangInduk()
    {
        //return static::findOne($id);
        $level = $this->user_level;
        if($level == "warehouse"){
            $usergudang = UserGudang::find()->where(['id_user' => $this->id])->one();
            if($usergudang != null){
                return $usergudang->gudang;
            }else{
                return new Gudang();
            }
        }

        return new Gudang();
    }


    public function getFullname()
    {
        $profile = User::find()->where(['id'=>$this->id])->one();
        if ($profile !==null)
            return $profile->full_name;
        return false;
    }

    public function setUserLevel()
    {
        if ($this->role == self::ROLE_USER) {
            $this->user_level = 'USR';
        } elseif ($this->role == self::ROLE_ADMIN) {
            $this->user_level = 'ADM';
        } elseif ($this->role == self::ROLE_OWNER) {
            $this->user_level = 'OWN';
        }
    }

    public function getUserLevel()
    {
        
        $rolename = AuthRoleName::find()->where(['auth_item_name' => $this->user_level])->one();
        if($rolename != null){
            return $rolename->role_name;
        }else{
            return "*".$this->user_level;
        }
    }

    public static function getListRoleLevel(){
        $models = \common\modules\auth\models\AuthItem::find()
            ->where(["type" => 1])
            //->orderBy(['id_asset_master'=>SORT_ASC, 'number1'=>SORT_ASC])
            ->all();
        $LIST_ITEM = array();
        foreach($models as $model){
            $rolename = AuthRoleName::find()->where(['auth_item_name' => $model->name])->one();
            if($rolename != null){
                if($rolename->is_active == 1){
                    if($rolename->as_generic_choice == 1){
                        $LIST_ITEM[$model->name] = $rolename->role_name;
                    }else{
                        //Jika tidak diset maka tidak perlu ditampilkan
                        $LIST_ITEM[$model->name] = $rolename->role_name;
                    }
                }
            }else{
                //$LIST_ITEM[$model->name] = "*".$model->name;
            }

        }

        return $LIST_ITEM;
    }

    public static function getActiveListRoleLevel(){
        $models = AuthRoleName::find()
            ->where(["is_active" => 1])
            //->orderBy(['id_asset_master'=>SORT_ASC, 'number1'=>SORT_ASC])
            ->all();
        $LIST_ITEM = array();
        foreach($models as $model){
            $LIST_ITEM[$model->auth_item_name ] = $model->role_name;

        }

        return $LIST_ITEM;
    }

}
