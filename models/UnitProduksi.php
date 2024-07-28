<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "unit_produksi".
 *
 * @property int $id_unit_produksi
 * @property string $nama_unit
 * @property string|null $lokasi
 * @property string $foto1
 * @property string|null $desc_fungsi
 * @property string|null $desc_material_in
 * @property string|null $desc_proses
 * @property string|null $desc_material_out
 * @property int|null $jumlah_operator
 */
class UnitProduksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit_produksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_unit', 'foto1'], 'required'],
            [['jumlah_operator'], 'integer'],
            [['nama_unit', 'lokasi', 'foto1', 'desc_fungsi', 'desc_material_in', 'desc_material_out'], 'string', 'max' => 250],
            [['desc_proses'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_unit_produksi' => 'Id Unit Produksi',
            'nama_unit' => 'Nama Unit',
            'lokasi' => 'Lokasi',
            'foto1' => 'Foto1',
            'desc_fungsi' => 'Desc Fungsi',
            'desc_material_in' => 'Desc Material In',
            'desc_proses' => 'Desc Proses',
            'desc_material_out' => 'Desc Material Out',
            'jumlah_operator' => 'Jumlah Operator',
        ];
    }
}
