<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_absensi_pegawai".
 *
 * @property int $id_hrm_absensi_pegawai
 * @property int $id_pegawai
 * @property string $tanggal_absen
 * @property int $id_mst_jenis_absensi
 * @property string|null $waktu_login
 * @property string|null $waktu_logout
 * @property string|null $izin_antara_logout
 * @property string|null $izin_antara_login
 * @property int|null $total_menit_kerja
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 * @property string|null $modified_date
 * @property int|null $modified_id_user
 * @property string|null $modified_ip_address
 */
class HrmAbsensiPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_absensi_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'tanggal_absen', 'id_mst_jenis_absensi'], 'required'],
            [['id_pegawai', 'id_mst_jenis_absensi', 'total_menit_kerja', 'created_id_user', 'modified_id_user'], 'integer'],
            [['tanggal_absen', 'waktu_login', 'waktu_logout', 'izin_antara_logout', 'izin_antara_login', 'created_date', 'modified_date'], 'safe'],
            [['created_ip_address', 'modified_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hrm_absensi_pegawai' => 'Id Hrm Absensi Pegawai',
            'id_pegawai' => 'Pegawai',
            'tanggal_absen' => 'Tanggal Absen',
            'id_mst_jenis_absensi' => 'Jenis Absensi',
            'waktu_login' => 'Waktu Login',
            'waktu_logout' => 'Waktu Logout',
            'izin_antara_logout' => 'Izin Antara Logout',
            'izin_antara_login' => 'Izin Antara Login',
            'total_menit_kerja' => 'Total Menit Kerja',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
            'modified_date' => 'Modified Date',
            'modified_id_user' => 'Modified Id User',
            'modified_ip_address' => 'Modified Ip Address',
        ];
    }

    public function getPegawai()
    {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }
}
