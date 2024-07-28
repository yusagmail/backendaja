<?php

namespace backend\controllers;

use backend\models\TypeAsset1;
use backend\models\TypeAsset1Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TypeAsset1MainController implements the CRUD actions for TypeAsset1 model.
 */
class TypeAsset1MainController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TypeAsset1 models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TypeAsset1Search();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TypeAsset1 model.
     * @param int $id_type_asset
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_type_asset)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_type_asset),
        ]);
    }

    /**
     * Creates a new TypeAsset1 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TypeAsset1();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_type_asset' => $model->id_type_asset]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TypeAsset1 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_type_asset
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_type_asset)
    {
        $model = $this->findModel($id_type_asset);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_type_asset' => $model->id_type_asset]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TypeAsset1 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_type_asset
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_type_asset)
    {
        $this->findModel($id_type_asset)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TypeAsset1 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_type_asset
     * @return TypeAsset1 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_type_asset)
    {
        if (($model = TypeAsset1::findOne(['id_type_asset' => $id_type_asset])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
