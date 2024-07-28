<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "asset_item_incident".
 *
 * @property int $id_asset_item_incident
 * @property int $id_asset_item
 * @property string $incident_date
 * @property string $incident_datetime
 * @property string $incident_notes
 * @property string $reported_by
 * @property int $reported_user_id
 * @property string $reported_ip_address
 * @property string $photo1
 * @property int $photo2
 * @property int $photo3
 * @property int $photo4
 * @property int $photo5
 */
class AssetItemIncident extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $temp_photo1;
    public $temp_photo2;
    public $temp_photo3;
    public $temp_photo4;
    public $temp_photo5;

    public static function tableName()
    {
        return 'asset_item_incident';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item', 'incident_date'], 'required'],
            [['reported_user_id'], 'integer'],
            [['incident_date', 'incident_datetime'], 'safe'],
            [['incident_notes'], 'string'],
            [['reported_by', 'reported_ip_address'], 'string', 'max' => 250],
            [['photo1','photo2', 'photo3', 'photo4', 'photo5'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, jpeg, png, gif'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asset_item_incident' => 'Id Asset Item Incident',
            'id_asset_item' => 'Id Asset Item',
            'incident_date' => 'Incident Date',
            'incident_datetime' => 'Incident Datetime',
            'incident_notes' => 'Incident Notes',
            'reported_by' => 'Reported By',
            'reported_user_id' => 'Reported User ID',
            'reported_ip_address' => 'Reported Ip Address',
            'photo1' => 'Photo1',
            'photo2' => 'Photo2',
            'photo3' => 'Photo3',
            'photo4' => 'Photo4',
            'photo5' => 'Photo5',
        ];
    }
//    public function getImageurl()
//    {
//        return \Yii::$app->request->BaseUrl.'/images/asset_kejadian/'.$this->photo1;
//    }
    public function getAssetMaster()
    {
        return $this->hasOne(AssetMaster::className(), ['id_asset_master' => 'id_asset_item']);
    }

    public function getAssetItem()
    {
        //return $this->id_asset_item = $this->assetMaster->id_asset_item;
		return $this->hasOne(AssetItem::className(), ['id_asset_item' => 'id_asset_item']);
    }

    public function backupNameOldPicture()
    {
        $this->temp_photo1 = $this->photo1;
        $this->temp_photo2 = $this->photo2;
        $this->temp_photo3 = $this->photo3;
        $this->temp_photo4 = $this->photo4;
        $this->temp_photo5 = $this->photo5;
    }

    public function reloadOldPictureName()
    {
        $this->photo1 = $this->temp_photo1;
        $this->photo2 = $this->temp_photo2;
        $this->photo3 = $this->temp_photo3;
        $this->photo4 = $this->temp_photo4;
        $this->photo5 = $this->temp_photo5;
        $this->save(false);
    }
    public function upload()
    {
        if ($this->validate()) {
            //Direload dulu nama yang lama
            $this->reloadOldPictureName();

            //Dilakukan looping untuk pengecekan lagi
            for($i=1;$i<=1;$i++){
                $fieldname = "photo".$i;
                $uploadedFile = UploadedFile::getInstance($this, $fieldname);

                if (!empty($uploadedFile)) {
                    $this->$fieldname = "asset_item_incident_".$fieldname.'_'. $this->id_asset_item_incident . '.' . $uploadedFile->extension;
                    $uploadedFile->saveAs('../web/images/asset_kejadian/' . $this->$fieldname);
                    $this->save(false);
                }
            }

            return true;
        } else {
            return false;
        }
    }
    public function uploadFoto()
    {
        if ($this->validate()) {
            //Direload dulu nama yang lama
            $this->reloadOldPictureName();

            //Dilakukan looping untuk pengecekan lagi
            for($i=1;$i<=1;$i++){
                $fieldname = "photo".$i;
                $uploadedFile = UploadedFile::getInstance($this, $fieldname);

                if (!empty($uploadedFile)) {
                    $this->$fieldname = "asset_item_incident_".$fieldname.'_'. $this->id_asset_item_incident . '.' . $uploadedFile->extension;
                    $uploadedFile->saveAs('../web/images/asset_kejadian/' . $this->$fieldname);
                    $this->save(false);
                }
            }

            return true;
        } else {
            return false;
        }
    }
}
