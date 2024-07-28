<?php

namespace backend\controllers;

use Yii;
use backend\models\Witel;
use backend\models\WitelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WitelController implements the CRUD actions for Witel model.
 */
class WitelController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Witel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WitelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Witel model.
     * @param string $id_witel Id Witel
     * @return mixed
     */
    public function actionView($id_witel)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_witel),
        ]);
    }

    /**
     * Creates a new Witel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Witel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_witel' => $model->id_witel]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Witel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_witel Id Witel
     * @return mixed
     */
    public function actionUpdate($id_witel)
    {
        $model = $this->findModel($id_witel);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_witel' => $model->id_witel]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Witel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_witel Id Witel
     * @return mixed
     */
    public function actionDelete($id_witel)
    {
        $this->findModel($id_witel)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Witel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_witel Id Witel
     * @return Witel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_witel)
    {
        if (($model = Witel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
