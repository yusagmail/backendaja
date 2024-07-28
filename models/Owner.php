<?php

namespace backend\models;

/**
 * This is the model class for table "owner".
 *
 * @property int $id_owner
 * @property string $name
 * @property string $card_number
 * @property string $place_of_birth
 * @property string $date_of_birth
 * @property string $address
 * @property string $profession
 * @property string $file1
 * @property string $file2
 * @property string $file3
 */
class Owner extends \yii\db\ActiveRecord
{
    public $attachfile1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'owner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'card_number'], 'required'],
            [['date_of_birth'], 'safe'],
            [['name', 'card_number', 'place_of_birth', 'address', 'profession', 'file1', 'file2', 'file3'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_owner' => 'Id Owner',
            'name' => 'Name',
            'card_number' => 'Card Number',
            'place_of_birth' => 'Place Of Birth',
            'date_of_birth' => 'Date Of Birth',
            'address' => 'Address',
            'profession' => 'Profession',
            'file1' => 'File1',
            'file2' => 'File2',
            'file3' => 'File3',
        ];
    }

    public function uploadAttachFile1()
    {
        if ($this->validate()) {
            if(isset($this->attachfile1)){
                $filename = "file1-".$this->id_owner.'.'. $this->attachfile1->extension;
               // $this->attachfile1->saveAs('uploads/' . $this->attachfile1->baseName . '.' . $this->attachfile1->extension);
                $this->attachfile1->saveAs('uploads/owner/' . $filename);
                $this->file1 = $filename;
                $this->save(false);
                return true;
            
            }else{
                return false;
            }
            
        } else {
            return false;
        }
    }
    
}
