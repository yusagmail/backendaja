<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "material_in_item_proc".
 *
 * @property int $id_material_in_item_proc
 * @property int $id_material_in
 * @property int $yard_awal
 * @property int $yard_hasil1
 * @property int $yard_hasil2
 * @property int $yard_hasil3
 * @property int $yard_hasil4
 * @property int|null $yard_hasil5
 * @property int|null $yard_hasil6
 * @property int $yard_hasil_total
 * @property int $buang1
 * @property int $buang2
 * @property int $is_packing
 * @property int $id_basic_packing
 * @property int|null $created_id_user
 * @property string|null $created_date
 * @property string|null $created_ip_address
 */
class MaterialInItemProc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material_in_item_proc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_material_in', 'yard_awal', 'yard_hasil1'], 'required'],
            [['id_material_in', 'yard_awal', 'yard_hasil1', 'yard_hasil2', 'yard_hasil3', 'yard_hasil4', 'yard_hasil5', 'yard_hasil6', 
                'yard_hasil7', 'yard_hasil8', 'yard_hasil9', 'yard_hasil10', 
                'yard_hasil_total', 'buang1', 'buang2', 'is_packing', 'id_basic_packing', 'created_id_user',
                'id_basic_packing1', 'id_basic_packing2', 'id_basic_packing3', 'id_basic_packing4', 'id_basic_packing5', 'id_basic_packing6', 
                'id_basic_packing7', 'id_basic_packing8', 'id_basic_packing9', 'id_basic_packing10', 

                'created_id_user'
                ], 'integer'],
            [['created_date'], 'safe'],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_material_in_item_proc' => 'Id Material In Item Proc',
            'id_material_in' => 'Id Material In',
            'yard_awal' => 'Awal',
            'yard_hasil1' => 'H1',
            'yard_hasil2' => 'H2',
            'yard_hasil3' => 'H3',
            'yard_hasil4' => 'H4',
            'yard_hasil5' => 'H5',
            'yard_hasil6' => 'H6',
            'yard_hasil7' => 'H7',
            'yard_hasil8' => 'H8',
            'yard_hasil9' => 'H9',
            'yard_hasil10' => 'H10',
            'yard_hasil_total' => 'Yard Hasil Total',
            'buang1' => 'BS1',
            'buang2' => 'BS2',
            'is_packing' => 'Packing',
            'label_barcode_number1' => 'Barcode 1',
            'label_barcode_number2' => 'Barcode 2',
            'label_barcode_number3' => 'Barcode 3',
            'label_barcode_number4' => 'Yard Hasil4',
            'label_barcode_number5' => 'Yard Hasil5',
            'label_barcode_number6' => 'Yard Hasil6',
            'id_basic_packing1' => 'Packing1',
            'id_basic_packing2' => 'Packing2',
            'id_basic_packing3' => 'Packing3',
            'id_basic_packing4' => 'Packing4',
            'id_basic_packing5' => 'Packing5',
            'id_basic_packing6' => 'Packing6',
            'id_basic_packing7' => 'Packing7',
            'id_basic_packing8' => 'Packing8',
            'id_basic_packing9' => 'Packing9',
            'id_basic_packing10' => 'Packing10',
            'selisih_lebih' => 'Sel.Lbh',
            'selisih_kurang' => 'Sel.Krg',

            'id_material_kategori2' => 'Jenis',
            'id_material_kategori3' => 'Motif',
            'id_basic_packing' => 'Standard Packing',
            'created_id_user' => 'Created Id User',
            'created_date' => 'Created Date',
            'created_ip_address' => 'Created Ip Address',
        ];
    }


    public function getMaterialIn()
    {
        return $this->hasOne(MaterialIn::className(), ['id_material_in' => 'id_material_in']);
    }

    public function getBasicPacking()
    {
        return $this->hasOne(BasicPacking::className(), ['id_basic_packing' => 'id_basic_packing']);
    }

    public function generateBarcodeNumber(){
        for($i=1;$i<=6;$i++){
            $field = "yard_hasil".$i;
            if($this->$field > 0){
                $fieldtarget = "label_barcode_number".$i;
                $this->$fieldtarget = $this->id_material_in."-".$this->id_material_in_item_proc."-".$i."-".$this->$field;
            }
        }
        $this->save(false);
    }
}
