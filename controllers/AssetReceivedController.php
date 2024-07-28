<?php

namespace backend\controllers;

use backend\models\AssetItem;
use backend\models\AssetItemSearch;
use Yii;
use backend\models\AssetReceived;
use backend\models\AssetReceivedSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\utils\EncryptionDB;

/**
 * AssetReceivedController implements the CRUD actions for AssetReceived model.
 */
class AssetReceivedController extends Controller
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
     * Lists all AssetReceived models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssetReceivedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionReport()
    {
        $searchModel = new AssetReceivedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        return $this->render('report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AssetReceived model.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($c)
    {
        $id_asset_received = EncryptionDB::encryptor('decrypt', $c);

        $searchModel = new AssetItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['id_asset_received' => $id_asset_received]);

        return $this->render('view', [
            'model' => $this->findModel($id_asset_received),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new AssetReceived model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AssetReceived();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();

            $latestAssetItem = AssetItem::find()
                ->orderBy(['number1_int' => SORT_DESC])
                ->one();
            $numberItem = $latestAssetItem['number1'];

            $prefix = preg_replace('/[0-9]+/', '', $numberItem);
            $number = (int) preg_replace('/[^0-9]/', '', $numberItem);

            $quantity = (int) $model['quantity'];
            for ($i=1; $i <= $quantity; $i++) { 
                $number++;
                $newString = $prefix . sprintf("%03d", $number);

                $newAssetItem = new AssetItem();
                $newAssetItem->id_asset_received = $model->id_asset_received;
                $newAssetItem->id_asset_master = $model->id_asset_master;
                $newAssetItem->id_asset_item_location = 1;
                $newAssetItem->number1 = $newString;
                $newAssetItem->number1_int = $number;
                $newAssetItem->status_active = 1;
                $newAssetItem->save();
            }
            
            return $this->redirect(['view', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_received)]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AssetReceived model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($c)
    {
        $id_asset_received = EncryptionDB::encryptor('decrypt', $c);
        $model = $this->findModel($id_asset_received);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_received)]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
	
	public function actionNumbering()
    {
        $searchModel = new AssetReceivedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('numbering', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionNumberingView($u)
    {
		$id = EncryptionDB::staticEncryptor("decrypt",$u);
        return $this->render('numbering-view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Deletes an existing AssetReceived model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($c)
    {
        $id_asset_received = EncryptionDB::encryptor('decrypt', $c);
        $this->findModel($id_asset_received)->delete();

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the AssetReceived model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssetReceived the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssetReceived::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
