<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Vendor;
use Yii;
/**
 * VendorSearch represents the model behind the search form of `backend\models\Vendor`.
 */
class VendorSearch extends Vendor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_vendor', 'id_type_of_vendor', 'created_id_user', 'id_user'], 'integer'],
            [['name', 'company', 'address', 'city', 'state', 'zip', 'country', 'email_address', 'phone_number', 'created_date', 'created_time', 'created_ip_address'], 'safe'],
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
        $query = Vendor::find();

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
            'id_vendor' => $this->id_vendor,
            'id_type_of_vendor' => $this->id_type_of_vendor,
            'created_date' => $this->created_date,
            'created_time' => $this->created_time,
            'created_id_user' => $this->created_id_user,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'zip', $this->zip])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'email_address', $this->email_address])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
	
	public static function getVendorByCurrentUserid(){
		$res['result'] = new Vendor();
		$res['status'] = false;
		
		$one = Vendor::find()
                ->where(['id_user' => Yii::$app->user->identity->id])
                ->one();
		if($one != null){
			$res['result'] = $one;
			$res['status'] = true;
		}
		
		return $res;
	}
}
