<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property int $id_job
 * @property string $nama_job
 * @property string|null $remarks
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_job'], 'required'],
            [['nama_job', 'remarks'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_job' => 'Id Job',
            'nama_job' => 'Nama Job',
            'remarks' => 'Remarks',
        ];
    }
}
