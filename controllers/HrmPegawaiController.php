<?php

namespace backend\controllers;

use Yii;
use yii\helpers\Html;
use backend\models\HrmPegawai;
use backend\models\HrmPegawaiSearch;
use backend\models\User;
use backend\models\SecurityGenerator;
use backend\models\PrivateUsage;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\IdentityInterface;
use backend\models\Authassignment;
use backend\models\UploadForm;
use yii\web\UploadedFile;






/**
 * HrmPegawaiController implements the CRUD actions for HrmPegawai model.
 */
class HrmPegawaiController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all HrmPegawai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HrmPegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HrmPegawai model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewSelf()
    {
    
        $updateAge=$this->loadModelSelf();
        return $this->render('viewself', [
            'model'=> $this->loadModelSelf(),
            ]);
    }

    public function loadModelSelf()
    {
        $model = HrmPegawai::findOne(Yii::$app->user->identity->userid);
        if($model===null)
            throw new CHttpException(404,'Data pegawai yang anda minta tidak ada. Silakan cek kembali atau kontak ke administrator.');
        return $model;
    }

    /**
     * Creates a new HrmPegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrmPegawai();

        $timenow=date("Hisd");
        $max = $timenow*1;
        $rand = rand ( 200000000 , $max );
        $cid = $max + $rand;
       
        $model->cid = $cid; 
        $model->id_perusahaan = 201501;
        $model->created_user=Yii::$app->user->identity->username;
        $model->created_date=date("Y-m-d H:i:s");
        $model->created_ip_address=$_SERVER['REMOTE_ADDR'];

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id_pegawai]);
            }
        } 
            
            return $this->render('create', [
                'model' => $model,
            ]);
        
    }

    /**
     * Updates an existing HrmPegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pegawai]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HrmPegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HrmPegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return HrmPegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HrmPegawai::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionGeneratepegawai()
    {
    
        $searchModel = new HrmPegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    
       return $this->render('generate', [
        'searchModel'=>$searchModel,
        'dataProvider'=>$dataProvider,
        ]);

    }


    public function actionCreategenerate($id_pegawai)
    {
        $minimumNip = 4;
        $model=new User;
        $modelPegawai= $this->findModel($id_pegawai);

        if($modelPegawai->userid!=''){ // jika sudah ada userid nya
            Yii::$app->session->setFlash('danger', "Peserta Sudah Mempunyai User Id, Silahkan Ubah Password bila diperlukan");
            return $this->redirect(['generatepegawai']);
        }

        // user ID
        if($modelPegawai->NIP!=''){ // jika nip tidak kosong
            $safeNIP = str_replace(' ', '', $modelPegawai->NIP); // hilangkan spasi
            
            if (strlen($safeNIP) >= $minimumNip){ // jika nipnya lebih dari 6 (atau dinamis)
                $userid = $safeNIP;
            }else{

                Yii::$app->session->setFlash('danger', 'NIP Peserta Yang dipilih Kurang dari '.$minimumNip.' karakter');
               return $this->redirect(['generatepegawai']);
            }
        }else{
            Yii::$app->session->setFlash('danger', 'NIP Peserta Yang dipilih Kurang dari '.$minimumNip.' karakter');
            return $this->redirect(['generatepegawai']);
        }

        // password
        $currentOfficeData = PrivateUsage::getCurrentContact();
        $nameOfOfficeData = $currentOfficeData->nama_perusahaan;
        $safeNameOfOfficeData = str_replace(' ', '', $nameOfOfficeData); // hilangkan spasi
        $password = $safeNameOfOfficeData.'12345';

        $model->username=$userid;
        $model->password= $password;
        $enkripted_password=SecurityGenerator::CodeIdGenerate($password); // mengenkripsi password
		$model->pass_cnf=$enkripted_password;
        $model->password_hash=Yii::$app->security->generatePasswordHash($password);
        $model->full_name=$modelPegawai->nama_lengkap;
        $model->user_level='member';
        $model->role=10;
        //$model->setPassword($model->password);
        $model->generateAuthKey();
        $model->generatePasswordResetToken();
        $model->created_at=date("Y-m-d H:i:s");
        $model->updated_at=date("Y-m-d H:i:s");

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $modelPegawai->userid=$model->username;
                $modelPegawai->id_user=$model->id;
                $modelPegawai->save(false);

                //Auth Assignment juga harus diset
                $auth = Authassignment::find()->where([
                    'user_id' => $model->id,
                ])->one();
                if($auth!=null){
                    $auth->item_name = $model->user_level;
                }else{
                    $auth = new Authassignment();
                    $auth->user_id = $model->id;
                    $auth->item_name = $model->user_level;
                    $auth->created_at = date("Y-m-d H:i:s");
                }
                $auth->save(false);
                    
                $information  = 'Data User Id dan Password untuk Peserta telah dibuat. <br>'    ;
                $information .= 'Nama Pegawai : '.$model->full_name.' <br>';
                $information .= 'Username : '.$model->username.' <br>';
                $information .= 'Password : '.$model->password.' <br>';
                Yii::$app->session->setFlash('success', $information);
                return $this->redirect(['generatepegawai']);
            }
        }

        return $this->render('createGenerate',[
            'model'=>$model,
            'modelPegawai'=>$modelPegawai,
        ]);
    }


    public function actionCreategeneratemulti()
    {
        $minimumNip = 4;
        $errorNo=0;
        $dataError=array();
        $dataRight=array();
       


    
    $select = (array)Yii::$app->request->post('selection');

    foreach($select as $key=>$val){

                $model= new User();
                $modelPegawai= $this->findModel($val);
                
                $safeNIP = str_replace(' ', '', $modelPegawai->NIP);
                $userid = $safeNIP;

                $currentOfficeData = PrivateUsage::getCurrentContact();
                $nameOfOfficeData = $currentOfficeData->nama_perusahaan;
                $safeNameOfOfficeData = str_replace(' ', '', $nameOfOfficeData);
                $password = $safeNameOfOfficeData.'12345';

                $model->username=$userid;
                $model->password= $password;
                $enkripted_password=SecurityGenerator::CodeIdGenerate($password); // mengenkripsi password
		        $model->pass_cnf=$enkripted_password;
                $model->password_hash=Yii::$app->security->generatePasswordHash($password);
                $model->full_name=$modelPegawai->nama_lengkap;
                $model->user_level='member';
                $model->role=10;
                //$model->setPassword($model->password);
                $model->generateAuthKey();
                $model->generatePasswordResetToken();
                $model->created_at=date("Y-m-d H:i:s");
                $model->updated_at=date("Y-m-d H:i:s");
                
                if($modelPegawai->userid==''){ //jika pegawai belum memunyai user id
                    
                    if (strlen($userid) >= $minimumNip){
                        
                        if($model->save()){
                            
                            $modelPegawai->userid=$model->username;
                            $modelPegawai->id_user=$model->id;
                            $modelPegawai->save(false);

                            //Auth Assignment juga harus diset
                            $auth = Authassignment::find()->where([
                                'user_id' => $model->id,
                            ])->one();
                            if($auth!=null){
                                $auth->item_name = $model->user_level;
                            }else{
                                $auth = new Authassignment();
                                $auth->user_id = $model->id;
                                $auth->item_name = $model->user_level;
                                $auth->created_at = date("Y-m-d H:i:s");
                            }
                            $auth->save(false);
                            
                            $dataRight[]=array('id_pegawai'=>$val,'nama_pegawai'=>$modelPegawai->nama_lengkap,'userid'=>$model->username,'password'=>$model->password);
                        }else{
                            $errorNo++;
                            $errorSummary = Html::errorSummary($model);
                            $dataError[]= ['id_pegawai'=>$val,'nama_pegawai'=>$modelPegawai->nama_lengkap,'errorSummary'=>$errorSummary];
                            echo '<pre>';
                            print_r($model->getErrors());
                            exit;
                            
                        }
                    
                    }else{
                        $errorNo++;
                        $errorSummary = 'NIP Kurang dari '.$minimumNip.' karakter';
                        $dataError[]=array('id_pegawai'=>$val,'nama_pegawai'=>$modelPegawai->nama_lengkap,'errorSummary'=>$errorSummary);
                    }
                }else{
                     Yii::$app->session->setFlash('danger', "Peserta yg Dipilih Sudah Mempunyai Userid");
                    return $this->redirect(['generatepegawai']);
                } 

            }
                    
                    $dataInformation = array('right'=>$dataRight,'error'=>$dataError);
                    //Yii::app()->user->setFlash('multiinfo', $dataInformation);
                    Yii::$app->session->setFlash('multiinfo', $dataInformation);  
                    return $this->redirect(['generatepegawai']);
                    
        

    }

  
    public function actionUpdategenerate($id_pegawai)
    {
        $modelPegawai= $this->findModel($id_pegawai);
        //$model = User::find()->where(['username' => $modelPegawai->userid])->one();
        $model = User::findOne(['username' => $modelPegawai->userid]);

        if ($model == null){
            Yii::$app->session->setFlash('danger', "Data Userid Peserta Tidak Valid");
            return $this->redirect(['generatepegawai']);
        }

        if ($model->load(Yii::$app->request->post())) {

              if ($model->save()) {
                
                $plainPassword = $model->password;
                $enkripted_password=SecurityGenerator::CodeIdGenerate($plainPassword); // mengenkripsi password
                $model->pass_cnf=$enkripted_password;
                $model->password_hash = Yii::$app->security->generatePasswordHash($plainPassword);
                $model->save(false);

                $information  = 'Password User Telah diubah. <br>'    ;
                $information .= 'Nama Pegawai : '.$model->full_name.' <br>';
                $information .= 'User Id : '.$model->username.' <br>';
                $information .= 'Password : '.$model->password.' <br>';

                Yii::$app->session->setFlash('success', $information);  
                return $this->redirect(['generatepegawai']);
            }else{
                echo '<pre>';
                print_r($model->getErrors());
                exit;
            }

               
        } else{

        return $this->render('updategenerate',[
            'model'=>$model,
            'modelPegawai'=>$modelPegawai,
        ]);
            }
    }

    
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

}
