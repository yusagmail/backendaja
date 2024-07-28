<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\JurnalType;

/**
 * JurnalTypeSearch represents the model behind the search form of `backend\models\JurnalType`.
 */
class JurnalTypeSearch extends JurnalType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jurnal_type'], 'integer'],
            [['type_jurnal'], 'safe'],
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
        $query = JurnalType::find();

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
            'id_jurnal_type' => $this->id_jurnal_type,
        ]);

        $query->andFilterWhere(['like', 'type_jurnal', $this->type_jurnal]);

        return $dataProvider;
    }
}
