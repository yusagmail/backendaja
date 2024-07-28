<?php

namespace backend\controllers;

use Yii;
use backend\models\AssetItemDistributionCurrent;
use backend\models\AssetItemDistributionCurrentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssetItemDistributionCurrentController implements the CRUD actions for AssetItemDistributionCurrent model.
 */
class AssetItemDistributionCurrentController extends Controller
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
     * Lists all AssetItemDistributionCurrent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssetItemDistributionCurrentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AssetItemDistributionCurrent model.
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

    /**
     * Creates a new AssetItemDistributionCurrent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AssetItemDistributionCurrent();
		$model->status = "ACTIVE";
		$model->start_date = \app\common\helpers\Timeanddate::getCurrentDate();
        if ($model->load(Yii::$app->request->post())) {
			//Ambil Bulan dan Tahunnya --> Fungsinya untuk indexing saja untuk mempermudah query saat rekapitulasi atau searching
			$model->start_month = \app\common\helpers\Timeanddate::getMonthOnly($model->start_date);
			$model->start_year = \app\common\helpers\Timeanddate::getYearOnly($model->start_date);
			if($model->save()){
				return $this->redirect(['view', 'id' => $model->id_asset_item_distribution_current]);
			}
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AssetItemDistributionCurrent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_asset_item_distribution_current]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AssetItemDistributionCurrent model.
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
     * Finds the AssetItemDistributionCurrent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssetItemDistributionCurrent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssetItemDistributionCurrent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
