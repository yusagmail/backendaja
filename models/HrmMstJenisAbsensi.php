<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_mst_jenis_absensi".
 *
 * @property int $id_mst_jenis_absensi
 * @property string $jenis_absensi
 * @property int $is_aktif
 */
class HrmMstJenisAbsensi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_mst_jenis_absensi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_absensi'], 'required'],
            [['is_aktif'], 'integer'],
            [['jenis_absensi'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_jenis_absensi' => 'Id Mst Jenis Absensi',
            'jenis_absensi' => 'Jenis Absensi',
            'is_aktif' => 'Is Aktif',
        ];
    }
}
