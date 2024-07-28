<?php

namespace backend\controllers;

use backend\models\User;
use backend\models\UserSearch;
use common\models\ResetPassword;
use common\modules\auth\models\AuthAssignment;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $model2 = new AuthAssignment();

        if ($model->load(Yii::$app->request->post())) {
            $model->setPassword($model->password);
            $model->generateAuthKey();
            $model->generatePasswordResetToken();
            $model->setUserLevel();
            if ($model->save()) {
                $model2->user_id = $model->id;
                $model2->item_name = $model->user_level;
                $model2->created_at = $model->created_at;
                if ($model2->save(false)) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreateByRole($i)
    {
        $model = new User();
        $model2 = new AuthAssignment();

        $model->user_level = $i;

        if ($model->load(Yii::$app->request->post())) {
            $model->setPassword($model->password);
            $model->generateAuthKey();
            $model->generatePasswordResetToken();
            $model->setUserLevel();
            if ($model->save()) {
                $model2->user_id = $model->id;
                $model2->item_name = $model->user_level;
                $model2->created_at = $model->created_at;
                if ($model2->save(false)) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
            return $this->render('create-by-role', [
                'model' => $model,
                'i'=>$i,
            ]);
        }
        } else {
            return $this->render('create-by-role', [
                'model' => $model,
                'i'=>$i,
            ]);
        }
    }

    public function actionCreateRoleSales($i)
    {
        $model = new User();
        $model2 = new AuthAssignment();

        if ($model->load(Yii::$app->request->post())) {
            $id_outlet_penjualan = $model->password_reset_token;
            //echo $id_outlet_penjualan; exit();

            $model->setPassword($model->password);
            $model->generateAuthKey();
            $model->generatePasswordResetToken();
            $model->setUserLevel();

            $model->user_level = 'sales';

            if ($model->save()) {
                $model2->user_id = $model->id;
                $model2->item_name = $model->user_level;
                $model2->created_at = $model->created_at;

                //Simpan mapping ke data outlet
                $useroutlet = \backend\models\UserOutlet::find()
                ->where(['id_user' => $model->id, 'id_outlet_penjualan' => $id_outlet_penjualan])
                ->one();
                if($useroutlet == null){
                    $useroutlet = new \backend\models\UserOutlet();
                    $useroutlet->id_user = $model->id;
                    $useroutlet->id_outlet_penjualan = $id_outlet_penjualan;
                    $useroutlet->save(false);
                }

                if ($model2->save(false)) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }else{
                 return $this->render('user-outlet/create_sales', [
                    'model' => $model,
                    'i'=>$i,

                ]);
            }
        } else {
            return $this->render('user-outlet/create_sales', [
                'model' => $model,
                'i'=>$i,
            ]);
        }
    }

    public function actionUpdateRoleSales($i)
    {
        $model = $this->findModel($i);

        //Pinjam field : password_reset_token
        $model->password_reset_token = $model->outletPenjualanInduk->id_outlet_penjualan;
        $model->password = "-diset-";
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //Update Password
            //$model->setPassword($model->password);
            //$model->save(false);

            $id_outlet_penjualan = $model->password_reset_token;

            //Update ID Gudang
            $userOutlet = \backend\models\UserOutlet::find()
            ->where(['id_user' => $model->id])
            ->one();
            if($userOutlet != null){
                $userOutlet->id_outlet_penjualan = $id_outlet_penjualan;
                $userOutlet->save(false);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('user-outlet/update_sales', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateRoleWarehouse($i)
    {
        $model = $this->findModel($i);

        //Pinjam field : password_reset_token
        $model->password_reset_token = $model->gudangInduk->id_gudang;
        $model->password = "-diset-";

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //Update Password
            //$model->setPassword($model->password);
            //$model->save(false);

            $id_gudang = $model->password_reset_token;

            //Update ID Gudang
            $UserGudang = \backend\models\UserGudang::find()
            ->where(['id_user' => $model->id])
            ->one();
            if($UserGudang != null){
                $UserGudang->id_gudang = $id_gudang;
                $UserGudang->save(false);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('user-gudang/update_gudang', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreateRoleWarehouse($i)
    {
        $model = new User();
        $model2 = new AuthAssignment();

        if ($model->load(Yii::$app->request->post())) {
            $id_gudang = $model->password_reset_token;
            //echo $id_gudang; exit();

            $model->setPassword($model->password);
            $model->generateAuthKey();
            $model->generatePasswordResetToken();
            $model->setUserLevel();
            if ($model->save()) {
                $model2->user_id = $model->id;
                $model2->item_name = $model->user_level;
                $model2->created_at = $model->created_at;

                //Simpan mapping ke data gudang
                $UserGudang = \backend\models\UserGudang::find()
                ->where(['id_user' => $model->id, 'id_gudang' => $id_gudang])
                ->one();
                if($UserGudang == null){
                    $UserGudang = new \backend\models\UserGudang();
                    $UserGudang->id_user = $model->id;
                    $UserGudang->id_gudang = $id_gudang;
                    $UserGudang->save(false);
                }

                if ($model2->save(false)) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }else{
                 return $this->render('user-gudang/create_gudang', [
                    'model' => $model,
                    'i'=>$i,
                ]);
            }
        } else {
            return $this->render('user-gudang/create_gudang', [
                'model' => $model,
                'i'=>$i,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = User::SCENARIO_UPDATE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //Update Assignment

            $model2 = AuthAssignment::find()->where([
                    'user_id' => $model->id,
            ])
                ->one();
            if($model2 != null){
                $model2->user_id = $model->id;
                $model2->item_name = $model->user_level;
                $model2->created_at = $model->created_at;
                if ($model2->save(false)) {

                }
            }

            return $this->redirect(['view', 'id' => $model->id]);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionResetPassword($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $user = $this->findModel($id);
        
        $model = new ResetPassword();
        if ($model->load(Yii::$app->request->post()) && $model->changePassword($user)) {
            Yii::$app->session->setFlash('success', 'Ubah password berhasil! Silakan coba login kembali dengan password yang baru!');
            return $this->goBack();
        } else {
            return $this->render('reset-password', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //Delete auth-assignment juga
        $model = $this->findModel($id);
        $auth = Authassignment::find()
            ->where(['user_id' => $model->id])
            ->one();
        if($auth != null){
            $auth->delete();
        }
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
