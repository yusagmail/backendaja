<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SensorType;

/**
 * SensorTypeSearch represents the model behind the search form of `backend\models\SensorType`.
 */
class SensorTypeSearch extends SensorType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sensor_type'], 'integer'],
            [['sensor_type', 'description'], 'safe'],
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
        $query = SensorType::find();

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
            'id_sensor_type' => $this->id_sensor_type,
        ]);

        $query->andFilterWhere(['like', 'sensor_type', $this->sensor_type])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
