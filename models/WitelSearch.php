<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Witel;

/**
 * WitelSearch represents the model behind the search form of `backend\models\Witel`.
 */
class WitelSearch extends Witel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_witel', 'nama_witel', 'datel'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Witel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'id_witel', $this->id_witel])
            ->andFilterWhere(['like', 'nama_witel', $this->nama_witel])
            ->andFilterWhere(['like', 'datel', $this->datel]);

        return $dataProvider;
    }
}
