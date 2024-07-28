<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "supplier_delivery_order".
 *
 * @property int $id_supplier_delivery_order
 * @property int $id_supplier
 * @property string $nomor_surat_jalan
 * @property string $tanggal_surat_jalan
 * @property string $nomor_invoice
 * @property string $catatan
 */
class SupplierDeliveryOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier_delivery_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_supplier', 'nomor_surat_jalan', 'tanggal_surat_jalan', 'nomor_invoice'], 'required'],
            [['id_supplier'], 'integer'],
            [['tanggal_surat_jalan'], 'safe'],
            [['nomor_surat_jalan', 'nomor_invoice'], 'string', 'max' => 200],
            [['catatan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_supplier_delivery_order' => 'Id Surat Jalan Supplier',
            'id_supplier' => 'Supplier',
            'nomor_surat_jalan' => 'Nomor Surat Jalan',
            'tanggal_surat_jalan' => 'Tanggal Surat Jalan',
            'nomor_invoice' => 'Nomor Invoice',
            'catatan' => 'Catatan',
        ];
    }

    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id_supplier' => 'id_supplier']);
    }
}
