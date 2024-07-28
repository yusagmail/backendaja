<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Supervisor;

/**
 * SupervisorSearch represents the model behind the search form of `backend\models\Supervisor`.
 */
class SupervisorSearch extends Supervisor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_supervisor', 'NIK', 'nomor_telepon'], 'integer'],
            [['nama', 'nama_lengkap', 'jabatan', 'id_regional', 'id_witel'], 'safe'],
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
        $query = Supervisor::find();

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
        $query->andFilterWhere([
            'id_supervisor' => $this->id_supervisor,
            'NIK' => $this->NIK,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'NIK', $this->NIK])
            ->andFilterWhere(['like', 'nomor_telepon', $this->nomor_telepon])
            ->andFilterWhere(['like', 'jabatan', $this->jabatan])
            ->andFilterWhere(['like', 'id_regional', $this->id_regional])
            ->andFilterWhere(['like', 'id_witel', $this->id_witel]);

        return $dataProvider;
    }
}
