<?php

namespace backend\controllers;


use Yii;
use common\utils\EncryptionDB;

class DashboardDismantleController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //$searchModel = new RequestPickSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRecapMaster($im="")
    {
		//Ambil id_asset_master
        $id_asset_master = EncryptionDB::encryptor("decrypt", $im);
		
        return $this->render('recap-master', [
            'id_asset_master' => $id_asset_master,
        ]);
    }
}
