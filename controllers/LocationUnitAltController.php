<?php

namespace backend\controllers;

use Yii;
use backend\models\LocationUnit;
use backend\models\LocationUnitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LocationUnitController implements the CRUD actions for LocationUnit model.
 */
class LocationUnitAltController extends Controller
{
    /**
     * {@inheritdoc}
     */
   // public $mainLabel = AppVocabularySearch::getValueByKey('Type Asset 2');
    var $mainLabel = ('Location Unit');

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
     * Lists all LocationUnit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LocationUnitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'mainLabel' => \backend\models\AppVocabularySearch::getValueByKey($this->mainLabel),
        ]);
    }

    /**
     * Displays a single LocationUnit model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'mainLabel' => \backend\models\AppVocabularySearch::getValueByKey($this->mainLabel),
        ]);
    }

    /**
     * Creates a new LocationUnit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LocationUnit();
        $model->id_owner = -1; // Hardcoded
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_location_unit]);
        }

        return $this->render('create', [
            'model' => $model,
            'mainLabel' => \backend\models\AppVocabularySearch::getValueByKey($this->mainLabel),
        ]);
    }

    /**
     * Updates an existing LocationUnit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_location_unit]);
        }

        return $this->render('update', [
            'model' => $model,
            'mainLabel' => \backend\models\AppVocabularySearch::getValueByKey($this->mainLabel),
        ]);
    }

    /**
     * Deletes an existing LocationUnit model.
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

    /**
     * Finds the LocationUnit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LocationUnit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LocationUnit::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
