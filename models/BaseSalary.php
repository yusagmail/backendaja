<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "base_salary".
 *
 * @property int $id_base_salary
 * @property int $id_pegawai
 * @property int $gaji_pokok
 * @property int|null $tunjangan1
 * @property int|null $tunjangan2
 * @property int|null $tunjangan3
 * @property int|null $tunjangan4
 * @property int|null $tunjangan5
 * @property int $rate_lembur
 * @property int $rate_kehadiran
 * @property int|null $property1
 * @property int|null $property2
 * @property int|null $property3
 * @property int|null $property4
 * @property int|null $property5
 */
class BaseSalary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'base_salary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'gaji_pokok'], 'required'],
            [['id_pegawai', 'gaji_pokok', 'tunjangan1', 'tunjangan2', 'tunjangan3', 'tunjangan4', 'tunjangan5', 'rate_lembur', 'rate_kehadiran', 'property1', 'property2', 'property3', 'property4', 'property5'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_base_salary' => 'Id Base Salary',
            'id_pegawai' => 'Pegawai',
            'gaji_pokok' => 'Gaji Pokok',
            'tunjangan1' => 'Tunjangan1',
            'tunjangan2' => 'Tunjangan2',
            'tunjangan3' => 'Tunjangan3',
            'tunjangan4' => 'Tunjangan4',
            'tunjangan5' => 'Tunjangan5',
            'rate_lembur' => 'Rate Lembur',
            'rate_kehadiran' => 'Rate Kehadiran',
            'property1' => 'Property1',
            'property2' => 'Property2',
            'property3' => 'Property3',
            'property4' => 'Property4',
            'property5' => 'Property5',
        ];
    }

    public function getPegawai()
    {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }
}
