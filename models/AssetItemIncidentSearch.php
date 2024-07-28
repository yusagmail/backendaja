<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetItemIncident;

/**
 * AssetItemIncidentSearch represents the model behind the search form of `backend\models\AssetItemIncident`.
 */
class AssetItemIncidentSearch extends AssetItemIncident
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item_incident', 'id_asset_item', 'reported_user_id', 'photo1', 'photo2', 'photo3', 'photo4', 'photo5'], 'integer'],
            [['incident_date', 'incident_datetime', 'incident_notes', 'reported_by', 'reported_ip_address'], 'safe'],
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
        $query = AssetItemIncident::find()->joinWith('books', true);

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
            'id_asset_item_incident' => $this->id_asset_item_incident,
            'id_asset_item' => $this->id_asset_item,
            'incident_date' => $this->incident_date,
            'incident_datetime' => $this->incident_datetime,
            'reported_user_id' => $this->reported_user_id,
            'photo1' => $this->photo1,
            'photo2' => $this->photo2,
            'photo3' => $this->photo3,
            'photo4' => $this->photo4,
            'photo5' => $this->photo5,
        ]);

        $query->andFilterWhere(['like', 'incident_notes', $this->incident_notes])
            ->andFilterWhere(['like', 'reported_by', $this->reported_by])
            ->andFilterWhere(['like', 'reported_ip_address', $this->reported_ip_address]);

        return $dataProvider;
    }
	
	public static function getTotalAssetReport(){
		$val = 0;
		$val = AssetItemIncident::find()
			//->where(['status_active' => 1])
			->count();

        return $val;
    }
}
