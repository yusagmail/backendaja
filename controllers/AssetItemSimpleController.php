<?php

namespace backend\controllers;

use Yii;
use backend\models\AssetItem;
use backend\models\AssetMaster;
use backend\models\AssetItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssetItemController implements the CRUD actions for AssetItem model.
 */
class AssetItemSimpleController extends Controller
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
     * Creates a new AssetItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AssetItem();

        if ($model->load(Yii::$app->request->post())) {
            try {
                // Ensure optional fields are handled
                $model->number_series = $model->number_series ?: 0;
                $model->id_customer = $model->id_customer ?: 0;
                $model->id_asset_received = $model->id_asset_received ?: 0;
                $model->id_asset_item_location = $model->id_asset_item_location ?: 0;
                $model->id_asset_item_location_unit = $model->id_asset_item_location_unit ?: 0;
                $model->id_type_asset_item1 = $model->id_type_asset_item1 ?: 0;
                $model->id_type_asset_item2 = $model->id_type_asset_item2 ?: 0;
                $model->id_type_asset_item3 = $model->id_type_asset_item3 ?: 0;
                $model->id_type_asset_item4 = $model->id_type_asset_item4 ?: 0;
                $model->id_type_asset_item5 = $model->id_type_asset_item5 ?: 0;

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id_asset_item]);
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to save the asset item: ' . json_encode($model->getErrors()));
                }
            } catch (\Exception $e) {
                Yii::$app->session->setFlash('error', 'Error occurred: ' . $e->getMessage());
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }



    /**
     * Updates an existing AssetItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_asset_item]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AssetItem model.
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
     * Finds the AssetItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssetItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssetItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

     /**
     * Lists all AssetItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssetItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 100;

        // Dapatkan count per kategori asset master
        $assetCounts = AssetItem::find()
            ->alias('ai')
            ->select(['ai.id_asset_master', 'COUNT(*) AS count'])
            ->groupBy('ai.id_asset_master')
            ->indexBy('id_asset_master') // Menggunakan index untuk mempermudah akses
            ->asArray()
            ->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'assetCounts' => $assetCounts,
        ]);
    }

    /**
     * Displays a single AssetItem model.
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
     * Displays assets by category.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCategory($id)
    {
        $searchModel = new AssetItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['ai.id_asset_master' => $id]);

        return $this->render('category', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'category' => AssetMaster::findOne($id),
        ]);
    }

}
