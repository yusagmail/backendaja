<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sensor;

/**
 * SensorSearch represents the model behind the search form of `backend\models\Sensor`.
 */
class SensorSearch extends Sensor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sensor', 'id_marketplace', 'sensor_digital1', 'sensor_digital2', 'sensor_digital3', 'sensor_digital4', 'sensor_digital5', 'sensor_digital6', 'last_user_update', 'token', 'flag_new_changes', 'flag_ack_devices'], 'integer'],
            [['sensor_name', 'description', 'imei', 'cid', 'barcode1', 'last_update', 'last_update_ip_address'], 'safe'],
            [['sensor_analog1', 'sensor_analog2', 'sensor_analog3', 'sensor_analog4', 'sensor_analog5', 'sensor_analog6'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Sensor::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_sensor' => $this->id_sensor,
            'id_marketplace' => $this->id_marketplace,
            'sensor_analog1' => $this->sensor_analog1,
            'sensor_analog2' => $this->sensor_analog2,
            'sensor_analog3' => $this->sensor_analog3,
            'sensor_analog4' => $this->sensor_analog4,
            'sensor_analog5' => $this->sensor_analog5,
            'sensor_analog6' => $this->sensor_analog6,
            'sensor_digital1' => $this->sensor_digital1,
            'sensor_digital2' => $this->sensor_digital2,
            'sensor_digital3' => $this->sensor_digital3,
            'sensor_digital4' => $this->sensor_digital4,
            'sensor_digital5' => $this->sensor_digital5,
            'sensor_digital6' => $this->sensor_digital6,
            'last_update' => $this->last_update,
            'last_user_update' => $this->last_user_update,
            'token' => $this->token,
            'flag_new_changes' => $this->flag_new_changes,
            'flag_ack_devices' => $this->flag_ack_devices,
        ]);

        $query->andFilterWhere(['like', 'sensor_name', $this->sensor_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'imei', $this->imei])
            ->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'barcode1', $this->barcode1])
            ->andFilterWhere(['like', 'last_update_ip_address', $this->last_update_ip_address]);

        return $dataProvider;
    }


    public static function convertToGeoJson(){
        $geojson = array(
           'type'      => 'FeatureCollection',
           'features'  => array()
        );

        $listOfDatas = Sensor::find()->all();
        foreach($listOfDatas as $data) {

            $feature = array(
                'type' => 'Feature',
                'geometry' => array(
                    'type' => 'Point',
                    'coordinates' => array(
                       
                        //\common\helpers\GisHelper::convertNMEAToDegreeFormat("long", $data->data_value2), //longitude
                        //\common\helpers\GisHelper::convertNMEAToDegreeFormat("lat", $data->data_value1), //latitude
                        $data->data_value2,
                        $data->data_value1,
                    )
                ),
                'properties' => array(
                    'description' => $data->sensor_name,
                    'name' => 'Point',
                    'icon' => 'Point',
                ),
                //'properties' => $properties
            );
            # Add feature arrays to feature collection array
            array_push($geojson['features'], $feature);
        }

        return json_encode($geojson, JSON_NUMERIC_CHECK);
    }
    /*

    public static function convertToGeoJson(){
        $geojson = array(
           'type'      => 'FeatureCollection',
           'features'  => array()
        );

        $listOfDatas = Sensor::find()->all();
        foreach($listOfDatas as $data) {

            $feature = array(
                'type' => 'Feature',
                'geometry' => array(
                    'type' => 'Point',
                    'coordinates' => array(
                       
                        $data->longitude,
                        $data->latitude,
                    )
                ),
                'properties' => array(
                    'description' => $data->name,
                    'name' => 'Point',
                    'icon' => 'Point',
                    'id' => $data->id_point,
                ),
                //'properties' => $properties
            );
            # Add feature arrays to feature collection array
            array_push($geojson['features'], $feature);
        }

        return json_encode($geojson, JSON_NUMERIC_CHECK);
    }
    */
    
    public static function generateFileGeojson(){
        $jsonFilename = "sensor-item.geojson";

        //0. Check apakah file tersebut sudah ada atau belum

        $jsonFilename = "sensor-item.geojson";
        //$path = "mapbase/geojson/".$jsonFilename;
        $path = \Yii::getAlias('@webroot')."/localgeojson/".$jsonFilename;
        $path = "localgeojson/".$jsonFilename;
        //echo $path;


        //1. Cek terlebih dahulu apakah ada pembahruan data
        //Kalau ada generate data terlebih dahulu
        $myfile = fopen($path, "w") or die("Unable to open file!");
        $txt = \backend\models\SensorSearch::convertToGeoJson();
        fwrite($myfile, $txt);

        return $jsonFilename;
    }

    public static function getDescriptionValue($id_sensor){
        $sensor = \backend\models\Sensor::find()
            ->where(['id_sensor' => $id_sensor])
            ->one();
        $res = '';
        $list = array();
        if($sensor != null){
            $id_sensor_type = $sensor->id_sensor_type;

            //Labeling
            $labels = \backend\models\SensorLabel::find()
                ->where(['id_sensor_type' => $id_sensor_type])
                ->all();
            $no=0;
            foreach($labels as $label){
                $res .= $label->channel_number;
                $no++;
                $list[$no]['channel_number'] = $label->channel_number;
                $list[$no]['channel_name'] = $label->channel_name;
                $list[$no]['satuan'] = $label->satuan;

                $fieldname = "sensor_analog".$label->channel_number;
                $value = $sensor->$fieldname*1;

                $warning = '';
                $list[$no]['is_warning'] = false;
                $list[$no]['warning'] = '';
                if($label->is_warning_batas_atas == 1){
                    if(($value*1) > ($label->batas_atas*1)){
                        $list[$no]['is_warning'] = true;
                        $list[$no]['warning'] = 'over';
                    }
                }

                $list[$no]['value'] = $value;
            }
        }


        return $list;
    }

}
