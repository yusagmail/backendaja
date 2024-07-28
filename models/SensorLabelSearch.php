<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SensorLabel;

/**
 * SensorLabelSearch represents the model behind the search form of `backend\models\SensorLabel`.
 */
class SensorLabelSearch extends SensorLabel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sensor_label', 'id_sensor_type', 'channel_number', 'is_warning_batas_bawah', 'is_warning_batas_atas', 'color_batas_atas'], 'integer'],
            [['type_channel', 'channel_name', 'color_batas_bawah', 'color_normal'], 'safe'],
            [['batas_bawah', 'batas_atas'], 'number'],
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
        $query = SensorLabel::find();

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
            'id_sensor_label' => $this->id_sensor_label,
            'id_sensor_type' => $this->id_sensor_type,
            'channel_number' => $this->channel_number,
            'batas_bawah' => $this->batas_bawah,
            'is_warning_batas_bawah' => $this->is_warning_batas_bawah,
            'batas_atas' => $this->batas_atas,
            'is_warning_batas_atas' => $this->is_warning_batas_atas,
            'color_batas_atas' => $this->color_batas_atas,
        ]);

        $query->andFilterWhere(['like', 'type_channel', $this->type_channel])
            ->andFilterWhere(['like', 'channel_name', $this->channel_name])
            ->andFilterWhere(['like', 'color_batas_bawah', $this->color_batas_bawah])
            ->andFilterWhere(['like', 'color_normal', $this->color_normal]);

        return $dataProvider;
    }
}
