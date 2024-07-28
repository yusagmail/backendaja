<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pallet_gudang".
 *
 * @property int $id_pallet_gudang
 * @property int $id_gudang
 * @property string $nomor_pallet
 * @property string|null $kode
 * @property string|null $pallet_group
 * @property string|null $keterangan
 */
class PalletGudang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pallet_gudang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gudang', 'nomor_pallet'], 'required'],
            [['id_gudang'], 'integer'],
            [['nomor_pallet'], 'string', 'max' => 200],
            [['kode'], 'string', 'max' => 30],
            [['pallet_group'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pallet_gudang' => 'Id Pallet Gudang',
            'id_gudang' => 'Gudang',
            'nomor_pallet' => 'Nomor Pallet',
            'kode' => 'Kode',
            'pallet_group' => 'Pallet Group',
            'keterangan' => 'Keterangan',
        ];
    }

        public function getGudang()
    {
        return $this->hasOne(Gudang::className(), ['id_gudang' => 'id_gudang']);
    }
}
