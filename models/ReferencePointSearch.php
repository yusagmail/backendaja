<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ReferencePoint;

/**
 * ReferencePointSearch represents the model behind the search form of `backend\models\ReferencePoint`.
 */
class ReferencePointSearch extends ReferencePoint
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_reference_point'], 'integer'],
            [['name', 'display_name', 'latitude', 'longitude'], 'safe'],
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
        $query = ReferencePoint::find();

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
            'id_reference_point' => $this->id_reference_point,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'display_name', $this->display_name])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude]);

        return $dataProvider;
    }

    public static function convertToGeoJson(){
        $geojson = array(
           'type'      => 'FeatureCollection',
           'features'  => array()
        );

        $listOfDatas = ReferencePoint::find()->all();
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
                    'name' => 'ReferencePoint',
                    'id' => $data->id_reference_point,
                ),
                //'properties' => $properties
            );
            # Add feature arrays to feature collection array
            array_push($geojson['features'], $feature);
        }

        return json_encode($geojson, JSON_NUMERIC_CHECK);
    }

    public static function generateFileGeojson(){
        //0. Check apakah file tersebut sudah ada atau belum
        $jsonFilename = "referencepoint.geojson";
        //$path = "mapbase/geojson/".$jsonFilename;
        $path = \Yii::getAlias('@webroot')."/localgeojson/".$jsonFilename;
        $path = "localgeojson/".$jsonFilename;

        /*
        if(file_exists($path)){
            //echo 'File exist';
        }else{
            return 'File Geojson Not Found!';
        }
        */

        //1. Cek terlebih dahulu apakah ada pembahruan data
        //Kalau ada generate data terlebih dahulu
        $myfile = fopen($path, "w") or die("Unable to open file!");
        $txt = \backend\models\ReferencePointSearch::convertToGeoJson();
        fwrite($myfile, $txt);

        return $jsonFilename;
    }

    public static function addRemoveItem($id, $mode){
        $jsonFilename = "referencepoint.geojson";
        //$path = "mapbase/geojson/".$jsonFilename;
        $path = \Yii::getAlias('@webroot')."/localgeojson/".$jsonFilename;
        $path = "localgeojson/".$jsonFilename;
        //echo $path;

        
        /*
        if(file_exists($path)){
            //echo 'File exist';
        }else{
            return 'File Geojson Not Found!';
        }
        */

        $data = file_get_contents($path);
        // decode json to associative array
        $json_arr = json_decode($data, true);

        //Declare json
        $geojson = array(
           'type'      => 'FeatureCollection',
           'features'  => array()
        );

        // get array index to delete or add
        $arr_index = array();
        $statusFound = false;
        foreach ($json_arr as $key => $value) {
            //echo $key." ";
            if($key == "features"){
                $listitem = $value;
                foreach($listitem  as $key2=>$value2){
                    //echo $key2." ";
                    //echo $value2["properties"]["id"];
                    if(isset($value2["properties"]["id"])){
                        if($value2["properties"]["id"] == $id){
                            //echo $value2["properties"]["id"];
                            $statusFound == true;
                        }
                        else{
                            array_push($geojson['features'], $value2);
                        }
                    }
                    
                }
            }
        }

        $data = ReferencePoint::find()
            ->where(['id_reference_point'=>$id])
            ->one();

        if($mode == "add"){
            if($data != null){
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
                        'name' => 'ReferencePoint',
                        'icon' => 'ReferencePoint',
                        'id' => $data->id_reference_point,
                    ),
                    //'properties' => $properties
                );
                array_push($geojson['features'], $feature);
            }
        }

        //Add To New Json
        $geojsonready =  json_encode($geojson, JSON_NUMERIC_CHECK);
        $myfile = fopen($path, "w") or die("Unable to open file!");
        fwrite($myfile, $geojsonready);

        $result = array();
        if($data != null){
            $result['latitude'] = $data->latitude;
            $result['longitude'] = $data->longitude;
        }else{
            $result['latitude'] = 0;
            $result['longitude'] = 0;
        }

        return $result;
    }

    public static function clearAllItem(){
        //0. Check apakah file tersebut sudah ada atau belum
        $jsonFilename = "referencepoint.geojson";
        //$path = "mapbase/geojson/".$jsonFilename;
        $path = \Yii::getAlias('@webroot')."/localgeojson/".$jsonFilename;
        $path = "localgeojson/".$jsonFilename;
        //echo $path;
        /*
        if(file_exists($path)){
            //echo 'File exist';
        }else{
            return 'File Geojson Not Found!';
        }
        */


        //Create empty geojson
        $geojson = array(
           'type'      => 'FeatureCollection',
           'features'  => array()
        );

        $txt = json_encode($geojson, JSON_NUMERIC_CHECK);

        //1. Cek terlebih dahulu apakah ada pembahruan data
        //Kalau ada generate data terlebih dahulu
        $myfile = fopen($path, "w") or die("Unable to open file!");
        
        fwrite($myfile, $txt);

        return $jsonFilename;
    }
}