<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "departement".
 *
 * @property int $id_departement
 * @property string $departement_name
 * @property string $description
 * @property int $is_active
 */
class Departement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['departement_name'], 'required'],
            [['is_active'], 'integer'],
            [['departement_name'], 'string', 'max' => 250],
            [['description'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_departement' => 'Id Departement',
            'departement_name' => 'Departement Name',
            'description' => 'Description',
            'is_active' => 'Is Active',
        ];
    }
}
