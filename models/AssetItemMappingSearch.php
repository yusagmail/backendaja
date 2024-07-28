<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetItemMapping;

/**
 * AssetItemMappingSearch represents the model behind the search form of `backend\models\AssetItemMapping`.
 */
class AssetItemMappingSearch extends AssetItemMapping
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item_mapping', 'id_asset_item', 'id_sensor', 'id_point'], 'integer'],
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
        $query = AssetItemMapping::find();

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
            'id_asset_item_mapping' => $this->id_asset_item_mapping,
            'id_asset_item' => $this->id_asset_item,
            'id_sensor' => $this->id_sensor,
            'id_point' => $this->id_point,
        ]);

        return $dataProvider;
    }



    public static function convertToGeoJson(){
        $geojson = array(
           'type'      => 'FeatureCollection',
           'features'  => array()
        );

        $listOfDatas = Point::find()->all();
        foreach($listOfDatas as $data) {


            //Cek is_alert dari data mapping
            $is_alert = false;
            $assetItemMapping = \backend\models\AssetItemMapping::find()
                ->where(['id_point' => $data->id_point])
                ->one();

            $listStatusSensor = "";
            if($assetItemMapping != null){
                if(isset($assetItemMapping->sensor)){
                    //echo "Alert : ".$assetItemMapping->sensor->is_alert;
                    if($assetItemMapping->sensor->is_alert == 1){
                        $is_alert = true;
                    }
                    $listSensors = \backend\models\SensorSearch::getDescriptionValue($assetItemMapping->sensor->id_sensor);
                    foreach($listSensors as $listSensor){
                        $warning = '';
                        if($listSensor["is_warning"]){
                            $warning = '<span class="text-danger">('.$listSensor["warning"].')</span>';
                        }


                        $listStatusSensor .= $listSensor["channel_name"]. " : ".$listSensor["value"]. " ".$listSensor["satuan"].' '.$warning."<br>";
                    }
                }
            }

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
                    'list_status_sensor' => $listStatusSensor,
                    'name' => 'Point',
                    'icon' => 'Point',
                    'id' => $data->id_point,
                    'is_alert' => $is_alert
                ),
                //'properties' => $properties
            );
            # Add feature arrays to feature collection array
            array_push($geojson['features'], $feature);
        }

        return json_encode($geojson, JSON_NUMERIC_CHECK);
    }

    public static function generateFileGeojson(){
        $jsonFilename = "point.geojson";

        //0. Check apakah file tersebut sudah ada atau belum

        $jsonFilename = "point.geojson";
        //$path = "mapbase/geojson/".$jsonFilename;
        $path = \Yii::getAlias('@webroot')."/localgeojson/".$jsonFilename;
        $path = "localgeojson/".$jsonFilename;
        //echo $path;

        /*
        if(file_exists($path)){
            //echo 'File ada';
        }else{
            return 'File Geojson Not Found!';
        }
        */


        //1. Cek terlebih dahulu apakah ada pembahruan data
        //Kalau ada generate data terlebih dahulu
        $myfile = fopen($path, "w") or die("Unable to open file!");
        $txt = \backend\models\AssetItemMappingSearch::convertToGeoJson();
        fwrite($myfile, $txt);

        return $jsonFilename;
    }
}
