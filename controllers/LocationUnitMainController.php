<?php

namespace backend\controllers;

use Yii;
use backend\models\LocationUnit;
use backend\models\AssetItemLocationUnitSearch;
use backend\models\LocationUnitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LocationUnitController implements the CRUD actions for LocationUnit model.
 */
class LocationUnitMainController extends Controller
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
        $searchModel = new AssetItemLocationUnitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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

    public function actionCreate()
    {
        $model = new LocationUnit();

        if ($model->load(Yii::$app->request->post())) {
            // Ensure optional fields are handled
            $model->id_location_unit_parent = $model->id_location_unit_parent ?: 0;
            $model->id_owner = $model->id_owner ?: 0;
            $model->status1_changed_user = $model->status1_changed_user ?: 0;
            $model->status1_changed_time = $model->status1_changed_time ?: date('Y-m-d H:i:s');

            // Set default coordinates and dimensions if not provided
            $model->denah_start_x = $model->denah_start_x ?: 0;
            $model->denah_start_y = $model->denah_start_y ?: 0;
            $model->denah_panjang = $model->denah_panjang ?: 0;
            $model->denah_lebar = $model->denah_lebar ?: 0;

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id_location_unit]);
            } else {
                Yii::$app->session->setFlash('error', 'Failed to save the location unit: ' . json_encode($model->getErrors()));
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

    public function actionGetFloors($id)
    {
        $floors = LocationUnit::find()
            ->where(['id_location_unit_parent' => $id])
            ->all();

        if (!empty($floors)) {
            foreach ($floors as $floor) {
                echo "<option value='" . $floor->id_location_unit . "'>" . $floor->unit_name . "</option>";
            }
        } else {
            echo "<option value=''>No floors found</option>";
        }
    }

    public function actionGetRooms($id)
    {
        $rooms = LocationUnit::find()
            ->where(['id_location_unit_parent' => $id])
            ->all();

        if (!empty($rooms)) {
            foreach ($rooms as $room) {
                echo "<option value='" . $room->id_location_unit . "'>" . $room->unit_name . "</option>";
            }
        } else {
            echo "<option value=''>No rooms found</option>";
        }
    }
}
