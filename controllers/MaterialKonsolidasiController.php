<?php

namespace backend\controllers;

use Yii;
use backend\models\MaterialFinish;
use backend\models\MaterialFinishSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialFinishController implements the CRUD actions for MaterialFinish model.
 */
class MaterialKonsolidasiController extends Controller
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
     * Lists all MaterialFinish models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaterialFinishSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexKode($t="")
    {
        $searchModel = new MaterialFinishSearch();
        $kode = "200";
        if($t == ""){
            $kode = "200";
            $t=1;
        }
        

        switch($t){
            case 1:
                $kode = "200";
                break;
            case 2:
                $kode = "201";
                break;
            case 3:
                $kode = "001";
                break;
        }

        $searchModel->barcode_kode = $kode.'%';
        $dataProvider = $searchModel->searchLikeBarcode(Yii::$app->request->queryParams);

        return $this->render('material-list-kode', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            't'=>$t,
        ]);
    }

    public function actionRepairKode($t="")
    {
        $searchModel = new MaterialFinishSearch();
        $kode = "200";
        if($t == ""){
            $kode = "200";
            $t=1;
        }
        

        switch($t){
            case 1:
                $kode = "200";
                break;
            case 2:
                $kode = "201";
                break;
            case 3:
                $kode = "001";
                break;
        }

        $searchModel->barcode_kode = $kode.'%';
        $dataProvider = $searchModel->searchLikeBarcode(Yii::$app->request->queryParams);

        $models = $dataProvider->getModels();

        foreach ($models as $model) {
            $model->barcode_kode." <br>";
            $model->forceGenerateBarcode();
            $model->save(false);
        }

        return $this->render('material-list-kode', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            't'=>$t,
        ]);
    }

    public function actionListByBarcode($bc)
    {
        $searchModel = new MaterialFinishSearch();
        $searchModel->barcode_kode = $bc;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $subtitle = $bc;

        return $this->render('index-full', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'subtitle' => $subtitle,
        ]);
    }

    public function actionRegenerate($id){
        $model =  $this->findModel($id);
        $model->forceGenerateBarcode();
        $model->save(false);

        $request = Yii::$app->request;
        if ($request->isAjax) {
            return $this->renderAjax('/material-finish/view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            return $this->render('/material-finish/view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    public function actionIndexDuplicateBarcode()
    {
        $searchModel = new MaterialFinishSearch();
        $dataProvider = $searchModel->searchGroupByDuplicateBarcode(Yii::$app->request->queryParams);


        return $this->render('index-duplicate-barcode', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
    /**
     * Finds the MaterialFinish model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaterialFinish the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaterialFinish::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
