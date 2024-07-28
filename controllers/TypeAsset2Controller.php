<?php

namespace backend\controllers;

use Yii;
use backend\models\TypeAsset2;
use backend\models\TypeAsset2Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TypeAsset2Controller implements the CRUD actions for TypeAsset2 model.
 */
class TypeAsset2Controller extends Controller
{
    /**
     * {@inheritdoc}
     */
   // public $mainLabel = AppVocabularySearch::getValueByKey('Type Asset 2');
    var $mainLabel = ('Type Asset 2');

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
     * Lists all TypeAsset2 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TypeAsset2Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'mainLabel' => \backend\models\AppVocabularySearch::getValueByKey($this->mainLabel),
        ]);
    }

    /**
     * Displays a single TypeAsset2 model.
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
     * Creates a new TypeAsset2 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TypeAsset2();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_type_asset]);
        }

        return $this->render('create', [
            'model' => $model,
            'mainLabel' => \backend\models\AppVocabularySearch::getValueByKey($this->mainLabel),
        ]);
    }

    /**
     * Updates an existing TypeAsset2 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_type_asset]);
        }

        return $this->render('update', [
            'model' => $model,
            'mainLabel' => \backend\models\AppVocabularySearch::getValueByKey($this->mainLabel),
        ]);
    }

    /**
     * Deletes an existing TypeAsset2 model.
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
     * Finds the TypeAsset2 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TypeAsset2 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TypeAsset2::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
