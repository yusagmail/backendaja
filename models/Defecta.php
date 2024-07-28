<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "defecta".
 *
 * @property int $id_defecta
 * @property int|null $id_user
 * @property string|null $title
 * @property string|null $request_date
 * @property int|null $month
 * @property int|null $year
 * @property int $id_gudang
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Defecta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'defecta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'month', 'year', 'id_gudang'], 'integer'],
            [['request_date', 'created_at', 'updated_at'], 'safe'],
            [['id_gudang'], 'required'],
            [['title'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_defecta' => 'Id Defecta',
            'id_user' => 'Id User',
            'title' => 'Judul Defecta',
            'request_date' => 'Request Date',
            'month' => 'Month',
            'year' => 'Year',
            'id_gudang' => 'Gudang Asal',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    //Join table
    public function getGudang()
    {
        return $this->hasOne(Gudang::className(), ['id_gudang' => 'id_gudang']);
    }
}
