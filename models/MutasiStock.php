<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mutasi_stock".
 *
 * @property int $id_mutasi_stock
 * @property string $tanggal_mutasi
 * @property int $id_gudang_asal
 * @property int $id_gudang_tujuan
 * @property int $id_pemberi_perintah
 * @property int $id_pelaksana_perintah
 * @property string|null $keterangan
 */
class MutasiStock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mutasi_stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_mutasi', 'id_gudang_asal', 'id_gudang_tujuan', 'id_pemberi_perintah', 'id_pelaksana_perintah'], 'required'],
            [['tanggal_mutasi'], 'safe'],
            [['id_gudang_asal', 'id_gudang_tujuan', 'id_pemberi_perintah', 'id_pelaksana_perintah'], 'integer'],
            [['keterangan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mutasi_stock' => 'Id Mutasi Stock',
            'tanggal_mutasi' => 'Tanggal Mutasi',
            'id_gudang_asal' => 'Gudang Asal',
            'id_gudang_tujuan' => 'Gudang Tujuan',
            'id_pemberi_perintah' => 'Pemberi Perintah',
            'id_pelaksana_perintah' => 'Pelaksana Perintah',
            'keterangan' => 'Keterangan',
        ];
    }

    public function getGudangAsal()
    {
        return $this->hasOne(Gudang::className(), ['id_gudang' => 'id_gudang_asal']);
    }

    public function getGudangTujuan()
    {
        return $this->hasOne(Gudang::className(), ['id_gudang' => 'id_gudang_tujuan']);
    }

    public function getPemberiPerintah()
    {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_pemberi_perintah']);
    }

    public function getPelaksanaPerintah()
    {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_pelaksana_perintah']);
    }
}
