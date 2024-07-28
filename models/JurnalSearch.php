<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Jurnal;

/**
 * JurnalSearch represents the model behind the search form of `backend\models\Jurnal`.
 */
class JurnalSearch extends Jurnal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jurnal', 'id_type_jurnal', 'id_akun_debit', 'debit', 'id_akun_kredit', 'kredit'], 'integer'],
            [['tanggal', 'keterangan'], 'safe'],
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
        $query = Jurnal::find();

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
            'id_jurnal' => $this->id_jurnal,
            'id_type_jurnal' => $this->id_type_jurnal,
            'tanggal' => $this->tanggal,
            'id_akun_debit' => $this->id_akun_debit,
            'debit' => $this->debit,
            'id_akun_kredit' => $this->id_akun_kredit,
            'kredit' => $this->kredit,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
