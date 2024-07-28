<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mst_status_dismantle_order".
 *
 * @property int $id_mst_status_dismantle_order
 * @property string $status_dismantle_order
 */
class MstStatusDismantleOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_status_dismantle_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_dismantle_order'], 'required'],
            [['status_dismantle_order'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_status_dismantle_order' => 'Id Mst Status Dismantle Order',
            'status_dismantle_order' => 'Status Dismantle Order',
        ];
    }
}
