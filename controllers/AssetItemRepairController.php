<?php

namespace backend\controllers;

use common\utils\EncryptionDB;
use Yii;
use backend\models\AssetItemRepair;
use backend\models\AssetItemRepairSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssetItemRepairController implements the CRUD actions for AssetItemRepair model.
 */
class AssetItemRepairController extends Controller
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
     * Lists all AssetItemRepair models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssetItemRepairSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AssetItemRepair model.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($c)
    {
        $id_assetitem_repair = EncryptionDB::encryptor('decrypt', $c);
        return $this->render('view', [
            'model' => $this->findModel($id_assetitem_repair),
        ]);
    }

    /**
     * Creates a new AssetItemRepair model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AssetItemRepair();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_item_repair)]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AssetItemRepair model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($c)
    {
        $id_assetitem_repair = EncryptionDB::encryptor('decrypt', $c);
        $model = $this->findModel($id_assetitem_repair);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_item_repair)]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AssetItemRepair model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($c)
    {
        $id_assetitem_repair = EncryptionDB::encryptor('decrypt', $c);
        $this->findModel($id_assetitem_repair)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AssetItemRepair model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssetItemRepair the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssetItemRepair::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
