<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SalesJurnal;

/**
 * SalesJurnalSearch represents the model behind the search form of `backend\models\SalesJurnal`.
 */
class SalesJurnalSearch extends SalesJurnal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sales_jurnal', 'id_sales_order', 'id_customer', 'id_akun_debit', 'debit', 'id_akun_kredit', 'kredit', 'id_bank_pembayaran', 'jumlah_bayar', 'created_user_id'], 'integer'],
            [['type', 'tanggal', 'keterangan', 'bayar_cara', 'bayar_bukti', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = SalesJurnal::find();

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
            'id_sales_jurnal' => $this->id_sales_jurnal,
            'id_sales_order' => $this->id_sales_order,
            'id_customer' => $this->id_customer,
            'tanggal' => $this->tanggal,
            'id_akun_debit' => $this->id_akun_debit,
            'debit' => $this->debit,
            'id_akun_kredit' => $this->id_akun_kredit,
            'kredit' => $this->kredit,
            'id_bank_pembayaran' => $this->id_bank_pembayaran,
            'jumlah_bayar' => $this->jumlah_bayar,
            'created_date' => $this->created_date,
            'created_user_id' => $this->created_user_id,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'bayar_cara', $this->bayar_cara])
            ->andFilterWhere(['like', 'bayar_bukti', $this->bayar_bukti])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $dataProvider->setSort([
            'defaultOrder' => ['tanggal' => SORT_DESC, 'created_date' =>SORT_DESC ]
        ]);

        return $dataProvider;
    }

    /*
    Untuk mengecek apakah pembayaran bertahap sudah dilakukan atau belum
    Atau apakah pembayaran tunai sudah dilakukan.
    */
    public static function checkPembayaranStatus($id_sales_order){
        $status  = array();
        $status['pembayaran_bertahap_exist'] = false;
        if (($modelso = SalesOrder::findOne($id_sales_order)) !== null) {
            $invoice_total = $modelso->invoice_total;

            $total = 0;
            $records = 0;
            $salesjurnals = \backend\models\SalesJurnal::find()->where([
                      'id_sales_order' => $id_sales_order,
            ])
            ->all();
            foreach($salesjurnals as $salesjurnal){
                $total += ($salesjurnal->debit - $salesjurnal->kredit);
                $records ++;
            }

            
            //Cek apakah sudah ada pembayaran bertahap?
            if($records >= 1 && $invoice_total != $total){
                $status['pembayaran_bertahap_exist'] = true;
                
            }

            return $status;
        }

        //throw new NotFoundHttpException('The requested page does not exist.');
    }
}
