<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property int $id_plan
 * @property int $id_defecta
 * @property string $name_plan
 * @property string $description
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_defecta', 'name_plan', 'description'], 'required'],
            [['id_defecta'], 'integer'],
            [['description'], 'string'],
            [['name_plan'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_plan' => 'Id Plan',
            'id_defecta' => 'Id Defecta',
            'name_plan' => 'Name Plan',
            'description' => 'Description',
        ];
    }
    public function getDefecta()
    {
        return $this->hasOne(Defecta::className(), ['id_defecta' => 'id_defecta']);
    }
}
