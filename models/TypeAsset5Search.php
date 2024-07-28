<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TypeAsset5;

/**
 * TypeAsset5Search represents the model behind the search form of `backend\models\TypeAsset5`.
 */
class TypeAsset5Search extends TypeAsset5
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_type_asset', 'is_active'], 'integer'],
            [['type_asset', 'description'], 'safe'],
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
        $query = TypeAsset5::find();

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
            'id_type_asset' => $this->id_type_asset,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'type_asset', $this->type_asset])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
