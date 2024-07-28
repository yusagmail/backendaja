<?php

namespace backend\controllers;

use Yii;
use backend\models\BankPembayaran;
use backend\models\LocationUnit;
use backend\models\BankPembayaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BankPembayaranController implements the CRUD actions for BankPembayaran model.
 */
class AssetMapIndoorDistributionController extends Controller
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
     * Lists all BankPembayaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        ///$searchModel = new BankPembayaranSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$this->layout = false;
        return $this->render('index_map_distribution3', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFullMap()
    {
        ///$searchModel = new BankPembayaranSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout = false;
        return $this->render('full_map', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
    }

    public function actionGetListLocationUnit($idp)
    {
        // Fetch the location units based on the parent id
        $units = \backend\models\LocationUnit::find()
            ->where(['id_location_unit_parent' => $idp])
            ->all();

        $hasil = [];
        $scaler = 100;
        foreach ($units as $unit) {
            // Join AssetItemLocationUnit with AssetItem to fetch related asset items
            $assetItems = \backend\models\AssetItemLocationUnit::find()
                ->joinWith('assetItem')
                ->where(['asset_item_location_unit.id_location_unit' => $unit->id_location_unit])
                ->all();

            $assets = [];
            foreach ($assetItems as $item) {
                $assets[] = [
                    'id' => $item->id_asset_item,
                    'keterangan' => $item->assetItem->number3,
                ];
            }

            $hasil[] = [
                'id' => $unit->id_location_unit,
                'name' => $unit->unit_name,
                'name' => $unit->unit_name,
                'start_x' => $unit->denah_start_x,
                'start_y' => $unit->denah_start_y,
                'length' => $unit->denah_panjang,
                'width' => $unit->denah_lebar,
                'contents' => $unit->unit_name,
                'assets' => $assets
            ];
        }

        echo json_encode($hasil);
        return;
    }

    public function actionGetListLocationUnit2($idp)
    {
        // Fetch the location units based on the parent id
        $units = \backend\models\LocationUnit::find()
            ->where(['id_location_unit_parent' => $idp])
            ->all();

        $hasil = [];
        $scaler = 100;
        foreach ($units as $unit) {
            // Join AssetItemLocationUnit with AssetItem to fetch related asset items
            $assetItems = \backend\models\AssetItemLocationUnit::find()
            ->joinWith(['assetItem', 'assetItem.assetMaster'])
            ->where(['asset_item_location_unit.id_location_unit' => $unit->id_location_unit])
            ->all();
        


            $assets = [];
           
            foreach ($assetItems as $item) {
              
                $assets[] = [
                    'id' => $item->id_asset_item,
                    'keterangan' => $item->assetItem->assetMaster->asset_name,
                ];
            }

            $hasil[] = [
                'id' => $unit->id_location_unit,
                'name' => $unit->name,
                'label' => $unit->unit_name,
                'x' => $unit->denah_start_x * $scaler,
                'y' => $unit->denah_start_y * $scaler,
                'height' => $unit->denah_panjang * $scaler,
                'width' => $unit->denah_lebar * $scaler,
                'contents' => $unit->unit_name,
                'assets' => $assets
            ];
        }

        echo json_encode($hasil);
        return;
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

        if ($model->load(Yii::$app->request->post())) {
            try {
                // Set default values for optional fields if they are empty or null
                $optionalFields = [
                    'id',
                    'id_location_unit_parent',
                    'unit_name',
                    'number_reg',
                    'denah_start_x',
                    'denah_start_y',
                    'denah_panjang',
                    'denah_lebar',
                    'id_owner',
                    'name',
                    'status1_changed_user',
                    'status1_changed_time',
                ];

                foreach ($optionalFields as $field) {
                    if ($model->$field === '' || $model->$field === null) {
                        $model->$field = 0;
                    }
                    
                }

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id_location_unit]);
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to save the location unit: ' . json_encode($model->getErrors()));
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
     * Updates an existing LocationUnit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        try {
            $model = $this->findModel($id);

            // Check if id_location is 0 and set it to 1
            if ($model->id_location == 0) {
                $model->id_location = 1;
            }

            if ($model->load(Yii::$app->request->post())) {
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id_location_unit]);
                } else {
                    Yii::$app->session->setFlash('error', 'An error occurred while saving the model: ' . json_encode($model->errors));
                }
            }
        } catch (\Exception $e) {
            Yii::$app->session->setFlash('error', 'An error occurred while updating the model: ' . $e->getMessage());
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
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
     * Finds the BankPembayaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BankPembayaran the loaded model
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
