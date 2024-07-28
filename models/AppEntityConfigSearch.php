<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AppEntityConfig;

/**
 * AppEntityConfigSearch represents the model behind the search form of `backend\models\AppEntityConfig`.
 */
class AppEntityConfigSearch extends AppEntityConfig
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_app_entity_config'], 'integer'],
            [['entity', 'setting_name', 'value'], 'safe'],
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
        $query = AppEntityConfig::find();

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
            'id_app_entity_config' => $this->id_app_entity_config,
        ]);

        $query->andFilterWhere(['like', 'entity', $this->entity])
            ->andFilterWhere(['like', 'setting_name', $this->setting_name])
            ->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
