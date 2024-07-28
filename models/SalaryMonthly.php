<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "salary_monthly".
 *
 * @property int $id_salary_monthly
 * @property int $id_pegawai
 * @property int $bulan
 * @property int $tahun
 * @property int $gaji_pokok
 * @property int|null $tunjangan1
 * @property int|null $tunjangan2
 * @property int|null $tunjangan3
 * @property int|null $tunjangan4
 * @property int|null $tunjangan5
 * @property int $jml_lembur
 * @property int $jml_kehadiran
 */
class SalaryMonthly extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salary_monthly';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'bulan', 'tahun', 'gaji_pokok'], 'required'],
            [['id_salary_monthly', 'id_pegawai', 'bulan', 'tahun', 'gaji_pokok', 'tunjangan1', 'tunjangan2', 'tunjangan3', 'tunjangan4', 'tunjangan5', 'jml_lembur', 'jml_kehadiran'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_salary_monthly' => 'Id Salary Monthly',
            'id_pegawai' => 'Nama Pegawai',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'gaji_pokok' => 'Gaji Pokok',
            'tunjangan1' => 'Tunjangan1',
            'tunjangan2' => 'Tunjangan2',
            'tunjangan3' => 'Tunjangan3',
            'tunjangan4' => 'Tunjangan4',
            'tunjangan5' => 'Tunjangan5',
            'jml_lembur' => 'Jml Lembur',
            'jml_kehadiran' => 'Jml Kehadiran',
        ];
    }

    public function getPegawai()
    {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }
}
