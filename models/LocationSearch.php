<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * LocationSearch represents the model behind the search form of `backend\models\Location`.
 */
class LocationSearch extends Location
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_location', 'id_kabupaten', 'id_propinsi', 'id_kecamatan', 'id_kelurahan'], 'integer'],
            [['location_name', 'description1', 'description2', 'latitude', 'longitude', 'address'], 'safe'],
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
        $query = Location::find();

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
            'id_location' => $this->id_location,
            'id_kabupaten' => $this->id_kabupaten,
            'id_propinsi' => $this->id_propinsi,
            'id_kecamatan' => $this->id_kecamatan,
            'id_kelurahan' => $this->id_kelurahan,
        ]);

        $query->andFilterWhere(['like', 'location_name', $this->location_name])
            ->andFilterWhere(['like', 'description1', $this->description1])
            ->andFilterWhere(['like', 'description2', $this->description2])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
