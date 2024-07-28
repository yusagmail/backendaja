<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reports".
 *
 * @property int $id
 * @property int $phenomenon_id
 * @property string|null $description
 * @property string|null $file
 * @property string|null $lat
 * @property string|null $long
 * @property string|null $referensi
 * @property int $user_id
 * @property int $village_id
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string $date
 *
 * @property Phenomenons $phenomenon
 * @property Users $user
 * @property Villages $village
 */
class Reports extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reports';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phenomenon_id', 'user_id', 'village_id'], 'required'],
            [['phenomenon_id', 'user_id', 'village_id', 'status'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at', 'date'], 'safe'],
            [['file', 'lat', 'long', 'referensi'], 'string', 'max' => 255],
            [['phenomenon_id'], 'exist', 'skipOnError' => true, 'targetClass' => Phenomenons::className(), 'targetAttribute' => ['phenomenon_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['village_id'], 'exist', 'skipOnError' => true, 'targetClass' => Villages::className(), 'targetAttribute' => ['village_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phenomenon_id' => 'Phenomenon ID',
            'description' => 'Description',
            'file' => 'File',
            'lat' => 'Lat',
            'long' => 'Long',
            'referensi' => 'Referensi',
            'user_id' => 'User ID',
            'village_id' => 'Village ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[Phenomenon]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhenomenon()
    {
        return $this->hasOne(Phenomenons::className(), ['id' => 'phenomenon_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Village]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVillage()
    {
        return $this->hasOne(Villages::className(), ['id' => 'village_id']);
    }
}
