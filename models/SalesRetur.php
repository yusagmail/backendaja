<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sales_retur".
 *
 * @property int $id_sales_retur
 * @property int $id_sales_order
 * @property int $tanggal_retur
 * @property string|null $alasan_retur
 * @property int $id_penerima_barang
 * @property string|null $catatan_kondisi_barang
 */
class SalesRetur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales_retur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sales_order', 'tanggal_retur', 'id_penerima_barang'], 'required'],
            [['id_sales_order', 'id_penerima_barang'], 'integer'],
            [['alasan_retur', 'catatan_kondisi_barang'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sales_retur' => 'Id Sales Retur',
            'id_sales_order' => 'Id Sales Order',
            'tanggal_retur' => 'Tanggal Retur',
            'alasan_retur' => 'Alasan Retur',
            'id_penerima_barang' => 'Penerima Barang',
            'catatan_kondisi_barang' => 'Catatan Kondisi Barang',
        ];
    }

    public function getPenerimaBarang()
    {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_penerima_barang']);
    }

    public static function checkReturIsExist($id_sales_order){
        $sr = \backend\models\SalesRetur::find()->where([
            'id_sales_order' => $id_sales_order,
        ])
        ->count();
        if($sr > 0 ){
            return true;
        }else{
            return false;
        }
    }
}
