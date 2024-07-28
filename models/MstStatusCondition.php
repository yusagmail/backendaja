<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mst_status_condition".
 *
 * @property int $id_mst_status_condition
 * @property string $condition
 * @property string $notes
 */
class MstStatusCondition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_status_condition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['condition'], 'required'],
            [['condition'], 'string', 'max' => 200],
            [['notes'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_status_condition' => 'Id Mst Status Condition',
            'condition' => 'Condition',
            'notes' => 'Notes',
        ];
    }
}
