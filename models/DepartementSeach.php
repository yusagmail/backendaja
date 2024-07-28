<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Departement;

/**
 * DepartementSeach represents the model behind the search form of `backend\models\Departement`.
 */
class DepartementSeach extends Departement
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_departement', 'is_active'], 'integer'],
            [['departement_name', 'description'], 'safe'],
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
        $query = Departement::find();

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
            'id_departement' => $this->id_departement,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'departement_name', $this->departement_name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
