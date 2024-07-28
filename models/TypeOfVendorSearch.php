<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TypeOfVendor;

/**
 * TypeOfVendorSearch represents the model behind the search form of `backend\models\TypeOfVendor`.
 */
class TypeOfVendorSearch extends TypeOfVendor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_type_of_vendor'], 'integer'],
            [['type_of_vendor', 'description'], 'safe'],
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
        $query = TypeOfVendor::find();

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
            'id_type_of_vendor' => $this->id_type_of_vendor,
        ]);

        $query->andFilterWhere(['like', 'type_of_vendor', $this->type_of_vendor])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
