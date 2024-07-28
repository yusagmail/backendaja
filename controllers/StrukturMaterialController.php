<?php

namespace backend\controllers;

use backend\models\StrukturMaterial;
use backend\models\StrukturMaterialItem;
use backend\models\StrukturMaterialItemSearch;
use backend\models\StrukturMaterialSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StrukturMaterialController implements the CRUD actions for StrukturMaterial model.
 */
class StrukturMaterialController extends Controller
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
     * Lists all StrukturMaterial models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StrukturMaterialSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StrukturMaterial model.
     * @param int $id Id Struktur Material
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
         //Ini Item Struktur Material Item
         $searchModel = new StrukturMaterialItemSearch();
         $searchModel->id_struktur_material = $id;
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
        ]);
    }

    /**
     * Creates a new StrukturMaterial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StrukturMaterial();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_struktur_material]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing StrukturMaterial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id Id Struktur Material
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_struktur_material]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    
    /*
    $ip = id parent ($id_struktur_material)
    */
    public function actionCreateItem($ip)
    {
        $model = new StrukturMaterialItem();
        $model->id_struktur_material = $ip;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $ip]);
        }

        return $this->render('/struktur-material/item/create_add', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StrukturMaterial model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id Id Struktur Material
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StrukturMaterial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id Id Struktur Material
     * @return StrukturMaterial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StrukturMaterial::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
