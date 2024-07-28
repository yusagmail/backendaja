<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mrp_project".
 *
 * @property int $id_mrp_project
 * @property int $id_customer
 * @property string $project_name
 * @property string|null $remark
 * @property int $is_internal_order
 * @property int $is_main_order
 * @property string|null $plan_start_date
 * @property string|null $plan_end_date
 * @property int|null $actual_start_date
 * @property int|null $actual_end_date
 */
class MrpProject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mrp_project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_customer', 'project_name', 'is_internal_order', 'is_main_order'], 'required'],
            [['id_customer', 'is_internal_order', 'is_main_order', 'actual_start_date', 'actual_end_date'], 'integer'],
            [['remark'], 'string'],
            [['plan_start_date', 'plan_end_date'], 'safe'],
            [['project_name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mrp_project' => 'Id Mrp Project',
            'id_customer' => 'Customer',
            'project_name' => 'Project Name',
            'remark' => 'Remark',
            'is_internal_order' => 'Is Internal Order?',
            'is_main_order' => 'Is Main Order?',
            'plan_start_date' => 'Plan - Start Date',
            'plan_end_date' => 'Plan - End Date',
            'actual_start_date' => 'Actual - Start Date',
            'actual_end_date' => 'Actual - End Date',
        ];
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id_customer' => 'id_customer']);
    }

    public function getStatusInternalOrder()
    {
        if ($this->is_internal_order == 1) {
            return 'YA';
        } else {
            return "TIDAK";
        }
    }

    public function getStatusMainOrder()
    {
        if ($this->is_main_order == 1) {
            return 'YA';
        } else {
            return "TIDAK";
        }
    }
}
