<?php

namespace backend\models;

/**
 * This is the model class for table "mst_status3".
 *
 * @property int $id_mst_status
 * @property string $mst_status
 * @property string $description
 * @property int $is_active
 */
class MstStatus3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_status3';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mst_status'], 'required'],
            [['description'], 'string'],
            [['is_active'], 'integer'],
            [['mst_status'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_status' => 'Id Mst Status',
            'mst_status' => 'Mst Status',
            'description' => 'Description',
            'is_active' => 'Is Active',
        ];
    }
}
