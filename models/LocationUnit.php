<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "location_unit".
 *
 * @property int $id_location_unit
 * @property bigint $id
 * @property int $id_location
 * @property int $id_location_unit_parent
 * @property int $id_owner
 * @property string $unit_name
 * @property string $name
 * @property int $denah_start_x
 * @property int $denah_start_y
 * @property int $denah_panjang
 * @property int $denah_lebar
 * @property int $status1_changed_user
 * @property string $status1_changed_time
 *
 * @property Location $location
 */
class LocationUnit extends \yii\db\ActiveRecord
{
    //public $number_reg;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location_unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_location', 'id_owner', 'name', 'status1_changed_user', 'status1_changed_time', ], 'required'],
            [['id', 'id_location', 'id_location_unit_parent', 'id_owner', 'denah_start_x', 'denah_start_y', 'denah_panjang', 'denah_lebar', 'status1_changed_user'], 'integer'],
            [['status1_changed_time'], 'safe'],
            [['unit_name', 'name', 'number_reg'], 'string', 'max' => 150],
            [['id_location'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['id_location' => 'id_location']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_location_unit' => 'ID Location Unit',
            'id' => 'ID',
            'id_location' => 'Location ID',
            'id_location_unit_parent' => 'Parent Location Unit ID',
            'id_owner' => 'Owner ID',
            'unit_name' => 'Unit Name',
            'name' => 'Name',
            'number_reg' => 'Number Reg',
            'denah_start_x' => 'Denah Start X',
            'denah_start_y' => 'Denah Start Y',
            'denah_panjang' => 'Denah Panjang',
            'denah_lebar' => 'Denah Lebar',
            'status1_changed_user' => 'Status Changed By',
            'status1_changed_time' => 'Status Changed Time',
        ];
    }

    /**
     * Gets query for [[Location]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id_location' => 'id_location']);
    }

    public function getParent()
    {
        return $this->hasOne(LocationUnit::className(), ['id_location_unit' => 'id_location_unit_parent']);
    }

    
}
?>
