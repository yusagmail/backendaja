<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "j_pembelian".
 *
 * @property int $id_j_pembelian
 * @property int $id_material_support
 * @property int $jumlah
 * @property double $total_biaya
 * @property string $no_bukti
 * @property string $tanggal_pembelian
 * @property int $bulan
 * @property int $tahun
 */
class JPembelian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'j_pembelian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_j_pembelian', 'id_material_support', 'jumlah', 'total_biaya', 'tanggal_pembelian', 'bulan', 'tahun'], 'required'],
            [['id_j_pembelian', 'id_material_support', 'jumlah', 'bulan', 'tahun'], 'integer'],
            [['total_biaya'], 'number'],
            [['tanggal_pembelian'], 'safe'],
            [['no_bukti'], 'string', 'max' => 250],
            [['id_j_pembelian'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_j_pembelian' => 'Id J Pembelian',
            'id_material_support' => 'Id Material Support',
            'jumlah' => 'Jumlah',
            'total_biaya' => 'Total Biaya',
            'no_bukti' => 'No Bukti',
            'tanggal_pembelian' => 'Tanggal Pembelian',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
        ];
    }
}
