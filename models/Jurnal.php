<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jurnal".
 *
 * @property int $id_jurnal
 * @property int $id_type_jurnal
 * @property string $tanggal
 * @property int $id_akun_debit
 * @property int $debit
 * @property int $id_akun_kredit
 * @property int $kredit
 * @property string|null $keterangan
 */
class Jurnal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jurnal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_type_jurnal', 'tanggal', 'id_akun_debit', 'debit', 'id_akun_kredit', 'kredit'], 'required'],
            [['id_type_jurnal', 'id_akun_debit', 'debit', 'id_akun_kredit', 'kredit'], 'integer'],
            [['tanggal'], 'safe'],
            [['keterangan'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jurnal' => 'Id Jurnal',
            'id_type_jurnal' => 'Id Type Jurnal',
            'tanggal' => 'Tanggal',
            'id_akun_debit' => 'Id Akun Debit',
            'debit' => 'Debit',
            'id_akun_kredit' => 'Id Akun Kredit',
            'kredit' => 'Kredit',
            'keterangan' => 'Keterangan',
        ];
    }
}
