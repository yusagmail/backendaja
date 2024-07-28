<?php

namespace backend\controllers;

use Yii;
use backend\models\AssetDismantleOrder;
use backend\models\AssetDismantleOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssetDismantleOrderController implements the CRUD actions for AssetDismantleOrder model.
 */
class AssetDismantleOrderDoneController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AssetDismantleOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssetDismantleOrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionReceived($i){
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        //echo 'masuk'. $id;

        $modelReceived = new \backend\models\AssetDismantleReceived();
        $modelReceived->id_asset_dismantle_order = $id;

        $modelOrder = $this->findModel($id);

        if ($modelReceived->load(Yii::$app->request->post()) && $modelReceived->save()) {
            $modelOrder->id_mst_status_dismantle_order = 2;
            $modelOrder->save(false);


            $i = \common\utils\EncryptionDB::encryptor('encrypt',$modelReceived->id_asset_dismantle_order);
            return $this->redirect(['view', 'i' => $i]);
        }

        return $this->render('create', [
            'model' => $modelReceived,
            'modelOrder' => $modelOrder,
        ]);

    }


    public function actionView($i){
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);

        $modelOrder = $this->findModel($id);
        $modelReceived = \backend\models\AssetDismantleReceived::find()
            ->where(['id_asset_dismantle_order' => $id])
            ->one();

        return $this->render('view', [
            'model' => $modelReceived,
            'modelOrder' => $modelOrder,
        ]);

    }

    /**
     * Finds the AssetDismantleOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssetDismantleOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssetDismantleOrder::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
