<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\LocationUnit;

/**
 * LocationUnitSearch represents the model behind the search form of `backend\models\LocationUnit`.
 */
class LocationUnitSearch extends LocationUnit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_location_unit', 'id', 'id_location', 'id_location_unit_parent', 'id_owner', 'denah_start_x', 'denah_start_y', 'denah_panjang', 'denah_lebar', 'status1_changed_user'], 'integer'],
            [['unit_name', 'name', 'number_reg', 'status1_changed_time', 'status1_changed_ip'], 'safe'],
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
        $query = LocationUnit::find();

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
            'id_location_unit' => $this->id_location_unit,
            'id' => $this->id,
            'id_location' => $this->id_location,
            'id_location_unit_parent' => $this->id_location_unit_parent,
            'id_owner' => $this->id_owner,
            'denah_start_x' => $this->denah_start_x,
            'denah_start_y' => $this->denah_start_y,
            'denah_panjang' => $this->denah_panjang,
            'denah_lebar' => $this->denah_lebar,
            'status1_changed_user' => $this->status1_changed_user,
            'status1_changed_time' => $this->status1_changed_time,
        ]);

        $query->andFilterWhere(['like', 'unit_name', $this->unit_name])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'number_reg', $this->number_reg])
            ->andFilterWhere(['like', 'status1_changed_ip', $this->status1_changed_ip]);

        return $dataProvider;
    }
}
?>
