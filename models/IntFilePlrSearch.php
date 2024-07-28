<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IntFilePlr;

/**
 * IntFilePlrSearch represents the model behind the search form of `backend\models\IntFilePlr`.
 */
class IntFilePlrSearch extends IntFilePlr
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_int_file_plr', 'created_user_id'], 'integer'],
            [['nama_file', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = IntFilePlr::find();

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
            'id_int_file_plr' => $this->id_int_file_plr,
            'created_date' => $this->created_date,
            'created_user_id' => $this->created_user_id,
        ]);

        $query->andFilterWhere(['like', 'nama_file', $this->nama_file])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
