<?php

namespace backend\controllers;

use Yii;
use backend\models\CpanelLeftmenu;
use backend\models\CpanelLeftmenuSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CpanelLeftmenuController implements the CRUD actions for CpanelLeftmenu model.
 */
class CpanelLeftmenuController extends Controller
{
    /**
     * @inheritdoc
     */
    /*
    public function behaviors()
    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                    'matchCallback' => function ($rule, $action) {

                        $module = Yii::$app->controller->module->id;
                        $action = Yii::$app->controller->action->id;
                        $controller = Yii::$app->controller->id;
                        $route = "$controller/$action";
                        $post = Yii::$app->request->post();
                        if (\Yii::$app->user->can($route)) {
                            return true;
                        }

                    }
                ],
            ],
        ];

        return $behaviors;

    }
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
     * Lists all CpanelLeftmenu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CpanelLeftmenuSearch();
        $searchModel->visible = 1;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CpanelLeftmenu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewAuth($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        return $this->render('view-auth', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CpanelLeftmenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CpanelLeftmenu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_leftmenu]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CpanelLeftmenu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-auth', 'id' => $model->id_leftmenu]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateAuth($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);

        $model = $this->findModel($id);
        $model->auth = array_map('trim',explode(',', $model->auth)); 

        if ($model->load(Yii::$app->request->post())) {
            $model->auth = implode(",",$_POST['CpanelLeftmenu']['auth']);
            if($model->save(false)){
                $i = \common\utils\EncryptionDB::encryptor('encrypt',$model->id_leftmenu);
                return $this->redirect(['view-auth', 'i' => $i]);
            }
        } else {
            return $this->render('update-auth', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CpanelLeftmenu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CpanelLeftmenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CpanelLeftmenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CpanelLeftmenu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
