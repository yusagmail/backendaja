<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Polyline;

/**
 * PolylineSearch represents the model behind the search form of `backend\models\Polyline`.
 */
class PolylineSearch extends Polyline
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_polyline'], 'integer'],
            [['name', 'display_name', 'color', 'draw_style', 'created_ts', 'modified_ts', 'deleted_ts'], 'safe'],
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
        $query = Polyline::find();

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
            'id_polyline' => $this->id_polyline,
            'created_ts' => $this->created_ts,
            'modified_ts' => $this->modified_ts,
            'deleted_ts' => $this->deleted_ts,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'display_name', $this->display_name])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'draw_style', $this->draw_style]);

        return $dataProvider;
    }

    public static function convertToGeoJsonPoly(){
        $geojson = array(
           'type'      => 'FeatureCollection',
           'features'  => array()
        );

        $listOfDatas = Polyline::find()->all();
        foreach($listOfDatas as $data) {
            $childs = PolylinePoint::find()
                ->where(['id_polyline'=>$data->id_polyline])
                ->orderBy(["point_seq" => SORT_ASC])
                ->all();
            $listcoordinate = array();
            foreach($childs as $child){
                if(isset($child->referencePoint)){
                    $listcoordinate[] = array(
                        $child->referencePoint->longitude,
                        $child->referencePoint->latitude,
                    );
                }
            }

            $feature = array(
                'type' => 'Feature',
                'geometry' => array(
                    'type' => 'LineString',
                    'coordinates' => ($listcoordinate)
                ),
                'properties' => array(
                    'description' => $data->name,
                    'name' => $data->name,
                    'id' => $data->id_polyline,
                    'icon' => 'LineString',
                ),
                //'properties' => $properties
            );
            # Add feature arrays to feature collection array
            array_push($geojson['features'], $feature);
            
        }

        return json_encode($geojson, JSON_NUMERIC_CHECK);
    }

    public static function generateFileGeojsonPoly(){
        //0. Check apakah file tersebut sudah ada atau belum
        $jsonFilename = "polyline.geojson";
        //$path = "mapbase/geojson/".$jsonFilename;
        $path = \Yii::getAlias('@webroot')."/localgeojson/".$jsonFilename;
        $path = "localgeojson/".$jsonFilename;

        /*
        if(file_exists($path)){
            //echo 'File exist';
        }else{
            return 'File Geojson Not Found ('.$path.')!';
        }
        */

        //1. Cek terlebih dahulu apakah ada pembahruan data
        //Kalau ada generate data terlebih dahulu
        $myfile = fopen($path, "w") or die("Unable to open file!");
        $txt = \backend\models\PolylineSearch::convertToGeoJsonPoly();
        //echo $txt;
        fwrite($myfile, $txt);

        return $jsonFilename;
    }

    public static function convertToGeoJson(){
        $geojson = array(
           'type'      => 'FeatureCollection',
           'features'  => array()
        );

        $listOfDatas = Polyline::find()->all();
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
                    'name' => 'Polyline',
                    'id' => $data->id_polyline,
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
        $jsonFilename = "polyline.geojson";
        //$path = "mapbase/geojson/".$jsonFilename;
        $path = \Yii::getAlias('@webroot')."/localgeojson/".$jsonFilename;
        $path = "localgeojson/".$jsonFilename;

        /*
        if(file_exists($path)){
            //echo 'File exist';
        }else{
            return 'File Geojson Not Found ('.$path.')!';
        }
        */

        //1. Cek terlebih dahulu apakah ada pembahruan data
        //Kalau ada generate data terlebih dahulu
        $myfile = fopen($path, "w") or die("Unable to open file!");
        $txt = \backend\models\PolylineSearch::convertToGeoJson();
        fwrite($myfile, $txt);

        return $jsonFilename;
    }

    public static function addRemoveItem($id, $mode){
        $jsonFilename = "polyline.geojson";
        //$path = "mapbase/geojson/".$jsonFilename;
        $path = \Yii::getAlias('@webroot')."/localgeojson/".$jsonFilename;
        $path = "localgeojson/".$jsonFilename;
        //echo $path;

        /*
        if(file_exists($path)){
            //echo 'File ada';
        }else{
            return 'File Geojson Not Found ('.$path.')!';
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

        $data = Polyline::find()
            ->where(['id_polyline'=>$id])
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
                        'name' => 'Polyline',
                        'icon' => 'Polyline',
                        'id' => $data->id_polyline,
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
        $jsonFilename = "polyline.geojson";
        //$path = "mapbase/geojson/".$jsonFilename;
        $path = \Yii::getAlias('@webroot')."/localgeojson/".$jsonFilename;
        $path = "localgeojson/".$jsonFilename;
        //echo $path;

        /*
        if(file_exists($path)){
            //echo 'File ada';
        }else{
            return 'File Geojson Not Found ('.$path.')!';
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

    public static function getChildLastSequence($id_parent){
        $datas = \backend\models\PolylinePoint::find()->where([
                    'id_polyline' => $id_parent,
                ])
                ->orderBy(['point_seq'=>SORT_DESC])
                ->all();
        $sequence = 0;
        foreach($datas as $data){
            $sequence = $data->point_seq;
            break;
        }

        return $sequence + 1;

    }

    public static function generateFileGeojsonSinglePoly($id_primary_add){
        //0. Check apakah file tersebut sudah ada atau belum
        $jsonFilename = "polyline-poly-single.geojson";
        //$path = "mapbase/geojson/".$jsonFilename;
        $path = \Yii::getAlias('@webroot')."/localgeojson/".$jsonFilename;
        $path = "localgeojson/".$jsonFilename;

        /*
        if(file_exists($path)){
            //echo 'File exist';
        }else{
            //return 'File Geojson Not Found ('.$path.')!';
            $fh = fopen($path, 'w');
        }
        */

        //1. Cek terlebih dahulu apakah ada pembahruan data
        //Kalau ada generate data terlebih dahulu
        $myfile = fopen($path, "w") or die("Unable to open file!");
        $txt = \backend\models\PolylineSearch::convertToGeoJsonSinglePoly($id_primary_add);
        //echo $txt;
        fwrite($myfile, $txt);

        //Generate Label
        PolylineSearch::generateFileGeojsonSinglePolyLabel($id_primary_add);

        return $jsonFilename;
    }

    public static function resetSingleFilePoly(){
        //0. Check apakah file tersebut sudah ada atau belum
        $jsonFilename = "polyline-poly-single.geojson";
        //$path = "mapbase/geojson/".$jsonFilename;
        $path = \Yii::getAlias('@webroot')."/localgeojson/".$jsonFilename;
        $path = "localgeojson/".$jsonFilename;

        $myfile = fopen($path, "w") or die("Unable to open file!");
        $txt = "";
        
        fwrite($myfile, $txt);

        return $jsonFilename;
    }

    public static function generateFileGeojsonSinglePolyLabel($id_primary_add){
        //0. Check apakah file tersebut sudah ada atau belum
        $jsonFilename = "polyline-poly-label-single.geojson";
        //$path = "mapbase/geojson/".$jsonFilename;
        $path = \Yii::getAlias('@webroot')."/localgeojson/".$jsonFilename;
        $path = "localgeojson/".$jsonFilename;

        /*
        if(file_exists($path)){
            //echo 'File exist';
        }else{
            //return 'File Geojson Not Found!';
            $fh = fopen($path, 'w');
        }
        */

        //1. Cek terlebih dahulu apakah ada pembahruan data
        //Kalau ada generate data terlebih dahulu
        $myfile = fopen($path, "w") or die("Unable to open file!");
        $txt = \backend\models\PolylineSearch::convertToGeoJsonSinglePolyLabel($id_primary_add);
        //echo $txt;
        fwrite($myfile, $txt);

        return $jsonFilename;
    }

    public static function resetSingleLabelFilePoly(){
        //0. Check apakah file tersebut sudah ada atau belum
        $jsonFilename = "polyline-poly-label-single.geojson";
        //$path = "mapbase/geojson/".$jsonFilename;
        $path = \Yii::getAlias('@webroot')."/localgeojson/".$jsonFilename;
        $path = "localgeojson/".$jsonFilename;

        $myfile = fopen($path, "w") or die("Unable to open file!");
        $txt = "";
        
        fwrite($myfile, $txt);

        return $jsonFilename;
    }

    public static function convertToGeoJsonSinglePoly($id_primary_add){
        $geojson = array(
           'type'      => 'FeatureCollection',
           'features'  => array()
        );

        $listOfDatas = Polyline::find()->where([
                    'id_polyline' => $id_primary_add,
                ])->all();
        foreach($listOfDatas as $data) {
            $childs = PolylinePoint::find()
                ->where(['id_polyline'=>$data->id_polyline])
                ->orderBy(["point_seq" => SORT_ASC])
                ->all();
            $listcoordinate = array();
            foreach($childs as $child){
                if(isset($child->referencePoint)){
                    $listcoordinate[] = array(
                        $child->referencePoint->longitude,
                        $child->referencePoint->latitude,
                    );
                }
            }

            $feature = array(
                'type' => 'Feature',
                'geometry' => array(
                    'type' => 'LineString',
                    'coordinates' => ($listcoordinate)
                ),
                'properties' => array(
                    'description' => $data->name,
                    'name' => $data->name,
                    'id' => $data->id_polyline,
                    'icon' => 'LineString',
                ),
                //'properties' => $properties
            );
            # Add feature arrays to feature collection array
            array_push($geojson['features'], $feature);
            
        }

        return json_encode($geojson, JSON_NUMERIC_CHECK);
    }

    public static function convertToGeoJsonSinglePolyLabel($id_primary_add){
        $geojson = array(
           'type'      => 'FeatureCollection',
           'features'  => array()
        );

        $listOfDatas = Polyline::find()->where([
                    'id_polyline' => $id_primary_add,
                ])->all();
        foreach($listOfDatas as $data) {
            $childs = PolylinePoint::find()
                ->where(['id_polyline'=>$data->id_polyline])
                ->orderBy(["point_seq" => SORT_ASC])
                ->all();
            //$listcoordinate = array();
            foreach($childs as $data) {

                $feature = array(
                    'type' => 'Feature',
                    'geometry' => array(
                        'type' => 'Point',
                        'coordinates' => array(
                            $data->referencePoint->longitude,
                            $data->referencePoint->latitude,
                        )
                    ),
                    'properties' => array(
                        //'description' => $data->referencePoint->name,
                        'description' => $data->point_seq,
                        'name' => 'ReferencePoint',
                        'id' => $data->id_reference_point,
                    ),
                    //'properties' => $properties
                );
                # Add feature arrays to feature collection array
                array_push($geojson['features'], $feature);
            }
            
        }

        return json_encode($geojson, JSON_NUMERIC_CHECK);
    }
}
