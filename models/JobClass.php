<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "job_class".
 *
 * @property int $id_job_class
 * @property string $namajob_class
 * @property string|null $keterangan
 */
class JobClass extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'namajob_class';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['namajob_class'], 'required'],
            [['namajob_class', 'keterangan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_job_class' => 'Id Job Class',
            'namajob_class' => 'Job Class',
            'keterangan' => 'Keterangan',
        ];
    }
}
