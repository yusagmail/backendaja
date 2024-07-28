<?php

namespace backend\controllers;

use common\helpers\RekapHelper;
use common\helpers\Timeanddate;
use backend\models\AbsKehadiranKaryawan;
use backend\models\HrmPegawai;
use backend\models\HrmPegawaiSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class LaporanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];

//        $behaviors['access'] = [
//            'class' => AccessControl::className(),
//            'only' => ['logout'],
//            'rules' => [
//                [
//                    'actions' => ['logout'],
//                    'allow' => true,
//                    'roles' => ['@'],
//                    'matchCallback' => function ($rule, $action) {
//
//                        $module = Yii::$app->controller->module->id;
//                        $action = Yii::$app->controller->action->id;
//                        $controller = Yii::$app->controller->id;
//                        $route = "$controller/$action";
//                        $post = Yii::$app->request->post();
//                        if (\Yii::$app->user->can($route)) {
//                            return true;
//                        }
//
//                    }
//                ],
//            ],
//        ];
//
//        $behaviors['verbs'] = [
//            'class' => VerbFilter::className(),
//            'actions' => [
//                'logout' => ['post'],
//            ],
//        ];
//
//        return $behaviors;
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays Laporan Harian.
     *
     * @return string
     */
    public function actionHarian()
    {
        return $this->render('harian');
    }

    /**
     * Displays Laporan Bulanan.
     *
     * @return string
     */

    public function actionBulanan()
    {
        $models = RekapHelper::getRekapBulanan(Timeanddate::getCurrentMonth(), Timeanddate::getCurrentYear());
        return $this->render('bulanan', ['models' => $models]);
    }
	
    public function actionLaporanRequest()
    {
        return $this->render('laporan-request');
    }
	
	public function actionLaporanPick()
    {
        return $this->render('laporan-pick');
    }
	
	public function actionLaporanReceived()
    {
        return $this->render('laporan-received');
    }
	
	public function actionLaporanPoin()
    {
        return $this->render('laporan-poin');
    }

//    public function actionKaryawan()
//    {
//        $nip = 99002;
//
//        $karyawan = HrmPegawai::find()
//            ->where(['NIP' => $nip])
////            ->andWhere(['tahun' => 2019])
//            ->one();
//
//        $jmlterlambat = array();
//
//        for ($x = 1; $x <= 12; $x++) {
//            $terlambat = AbsKehadiranKaryawan::find()
//                ->where(['NIP' => $nip])
//                ->andWhere(['tahun' => 2019])
//                ->andWhere(['status_terlambat' => 1])
//                ->andWhere(['bulan' => $x])
//                ->count();
//
//            $jmlterlambat[] = $terlambat;
//        }
//
//        $jmltidakmasuk = array();
//
//        for ($x = 1; $x <= 12; $x++) {
//            $tidakmasuk = AbsKehadiranKaryawan::find()
//                ->where(['NIP' => $nip])
//                ->andWhere(['tahun' => 2019])
//                ->andWhere(['status_hadir' => 0])
//                ->andWhere(['bulan' => $x])
//                ->count();
//
//            $jmltidakmasuk[] = $tidakmasuk;
//        }
//
////        $tahun = array();
//        $tahun = AbsKehadiranKaryawan::find()->select(['tahun'])->distinct()->all();
////        foreach ($tahun as $data) {
////            echo $data['tahun'];
////        }
//
//
//        return $this->render('karyawan', ['karyawan' => $karyawan, 'terlambat' => $jmlterlambat,
//            'tdkmasuk' => $jmltidakmasuk, 'tahun' => $tahun]);
//    }

    /**
     * Lists all HrmPegawai models.
     * @return mixed
     */
    public function actionAbsensi()
    {
        $searchModel = new HrmPegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $bulanan = RekapHelper::getRekapBulanan(Timeanddate::getCurrentMonth(), Timeanddate::getCurrentYear());

        return $this->render('absensi', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'bulanan' => $bulanan,
        ]);
    }

    /**
     * Displays a single HrmPegawai model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
//        $karyawan = HrmPegawai::find()
//            ->where(['id_pegawai' => $id])
////            ->andWhere(['tahun' => 2019])
//            ->one();

        $karyawan = $this->findModel($id);

        $nip = $karyawan->NIP;

        $jmlterlambat = array();

        for ($x = 1; $x <= 12; $x++) {
            $terlambat = AbsKehadiranKaryawan::find()
                ->where(['NIP' => $nip])
                ->andWhere(['tahun' => 2019])
                ->andWhere(['status_terlambat' => 1])
                ->andWhere(['bulan' => $x])
                ->count();

            $jmlterlambat[] = $terlambat;
        }

        $jmltidakmasuk = array();

        for ($x = 1; $x <= 12; $x++) {
            $tidakmasuk = AbsKehadiranKaryawan::find()
                ->where(['NIP' => $nip])
                ->andWhere(['tahun' => 2019])
                ->andWhere(['status_hadir' => 0])
                ->andWhere(['bulan' => $x])
                ->count();

            $jmltidakmasuk[] = $tidakmasuk;
        }

        $tahun = AbsKehadiranKaryawan::find()->select(['tahun'])->distinct()->all();

        return $this->render('karyawan', ['karyawan' => $karyawan, 'terlambat' => $jmlterlambat,
            'tdkmasuk' => $jmltidakmasuk, 'tahun' => $tahun]);
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

}
