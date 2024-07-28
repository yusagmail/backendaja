<?php

namespace backend\controllers;

use backend\models\AssetMaster;
use backend\models\AssetMasterSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * AssetMasterController implements the CRUD actions for AssetMaster model.
 */
class AssetMasterCompleteController extends Controller
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
     * Lists all AssetMaster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssetMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AssetMaster model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewStock($i, $action="index", $t="", $idi="")
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        return $this->render('view-stock', [
            'model' => $this->findModel($id),
            'i' => $i,
            'action' => $action,
            'idi' => $idi,
            't' => $t,
        ]);
    }

    /**
     * Creates a new AssetMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AssetMaster();
        $model->asset_code = "AUTO GENERATE";
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->asset_code == "AUTO GENERATE"){
                $model->asset_code = ""; //Harus dikosongkan dulu
                $model->asset_code = $model->generateMasterCode();
            }
            //$model->save(false);
            return $this->redirect(['view', 'id' => $model->id_asset_master]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AssetMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model->asset_code == ""){
            $model->asset_code = "AUTO GENERATE";
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->asset_code == "AUTO GENERATE"){
                $model->asset_code = ""; //Harus dikosongkan dulu
                $model->asset_code = $model->generateMasterCode();
            }
            return $this->redirect(['view', 'id' => $model->id_asset_master]);
            //return $this->redirect(['list']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AssetMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	/*IDEAL MODEL*/
	public function actionList()
    {
        $searchModel = new AssetMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('full/list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionCreateCategory()
    {
        $model = new AssetMaster();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_asset_master]);
			return $this->redirect(['list']);
        }

        return $this->render('full/create', [
            'model' => $model,
        ]);
    }
	
    public function actionUpdateCategory($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_asset_master]);
			return $this->redirect(['list']);
        }

        return $this->render('full/update', [
            'model' => $model,
        ]);
    }
	
	public function actionViewCategory($id)
    {
        return $this->render('full/view', [
            'model' => $this->findModel($id),
        ]);
    }
	


    /**
     * Finds the AssetMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssetMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssetMaster::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
