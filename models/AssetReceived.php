<?php

namespace backend\models;

/**
 * This is the model class for table "asset_received".
 *
 * @property int $id_asset_received
 * @property int $id_asset_master
 * @property string $number1
 * @property string $number2
 * @property string $number3
 * @property string $received_date
 * @property int $received_year
 * @property double $price_received
 * @property int $quantity
 * @property int $id_status_received
 */
class AssetReceived extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_received';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_master', 'quantity', 'received_date'], 'required'],
            [['id_asset_master', 'received_year', 'id_status_received'], 'integer'],
            [['received_date', 'attribute1', 'attribute2', 'attribute3', 'attribute4', 'attribute5'], 'safe'],
            [['price_received','quantity'], 'number'],
            [['number1', 'number2', 'number3', 'purchasing_invoice_number'], 'string', 'max' => 150],
			[['notes1', 'notes2', 'notes3'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        $labelArray = AppFieldConfigSearch::getLabels(AssetReceived::tableName());
        
        //Jika Mau Menambahkan Sendiri manual
        /*
        $labelArray['id_type_asset2'] = "Label Test 2";
        $labelArray['id_type_asset3'] = "Label Test 3";
        */
        return $labelArray;

        return [
            'id_asset_received' => 'Id Asset Received',
            'id_asset_master' => 'Asset',
            'number1' => 'Number 1',
            'number2' => 'Number 2',
            'number3' => 'Number 3',
            'received_date' => 'Tgl Pembelian / Penerimaan',
            'received_year' => 'Tahun Perolehan',
            'price_received' => 'Harga Pembelian / Perolehan',
            'quantity' => 'Jumlah',
            'id_status_received' => 'Kondisi Barang',
			'notes1' => 'Penggunaan',
        ];
    }

    public function getAssetMaster()
    {
        return $this->hasOne(AssetMaster::className(), ['id_asset_master' => 'id_asset_master']);
    }

    public function getStatusReceived()
    {
        return $this->hasOne(MstStatusReceived::className(), ['id_status_received' => 'id_status_received']);
    }
    public function getCount()
    {
        return $this->hasOne(AssetReceived::className(),['id_asset_master' => 'id_asset_master'])
            ->select('sum(asset_name,received_year)')
            ->from('asset_received')
            ->innerJoin('asset_master')
            ->groupBy('asset_name');

    }

    public function getYearsList() {
        $currentYear = date('Y');
        $yearFrom = 2018;
        $yearsRange = range($yearFrom, $currentYear);
        return array_combine($yearsRange, $yearsRange);
    }
}
