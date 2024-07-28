<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asset_dismantle_order".
 *
 * @property int $id_asset_dismantle_order
 * @property int $id_pegawai
 * @property string $type_order
 * @property int $id_job_class
 * @property string $order_date
 * @property string $order_number
 * @property int|null $order_increment
 * @property int|null $year
 * @property int $id_asset_item
 * @property int $nomor_telepon
 * @property int $id_customer
 * @property string|null $notes
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class AssetDismantleOrderAps extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_dismantle_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_order','order_date','id_customer' ], 'required'],
            [['id_supervisor', 'id_job_class', 'order_increment', 'year', 'id_asset_item', 'id_customer', 'created_id_user'], 'integer'],
            [['type_order', 'alamat_customer', 'contact_person'], 'string'],
            [['order_date', 'created_date'], 'safe'],
            [['order_number'], 'string', 'max' => 150],
            [['notes', 'created_ip_address'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_dismantle_order' => 'Id Asset Dismantle Order',
            'id_supervisor' => 'Teknisi',
            'type_order' => 'Type Order',
            'id_job_class' => 'Job Class',
            'nomor_telepon' => 'Nomor Telepon',
            'id_customer' => 'Id Customer',
            'alamat_customer'=>'Alamat',

            'order_date' => 'Order Date',
            'order_number' => 'Order Number',
            'order_increment' => 'Order Increment',
            'year' => 'Year',
            'id_customer' => 'Customer',
            'id_asset_item' => 'Barang',
            'notes' => 'Notes',
            'contact_person' => 'Kontak',
            'created_date' => 'Tanggal Aps',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
            'id_mst_status_dismantle_order' => 'Status'
        ];
    }
    public function getSupervisor()
    {
        return $this->hasOne(Supervisor::className(), ['id_supervisor' => 'id_supervisor']);
    }
    public function getJobclass()
    {
        return $this->hasOne(JobClass::className(), ['id_job_class' => 'id_job_class']);
    }
    public function getAssetitem()
    {
        return $this->hasOne(AssetItem::className(), ['id_asset_item' => 'id_asset_item']);
    }
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['nomor_telepon' => 'nomor_telepon']);
    }

    
    public function getStatusDismantleOrder()
    {
        return $this->hasOne(MstStatusDismantleOrder::className(), ['id_mst_status_dismantle_order' => 'id_mst_status_dismantle_order']);
    }
}
