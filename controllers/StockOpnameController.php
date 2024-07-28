<?php

namespace backend\controllers;

use Yii;
use backend\models\StockOpname;
use backend\models\StockOpnameSearch;
use backend\models\Gudang;
use backend\models\StockOpnameItem;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StockOpnameController implements the CRUD actions for StockOpname model.
 */
class StockOpnameController extends Controller
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
     * Lists all StockOpname models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StockOpnameSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StockOpname model.
     * @param string $id
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
     * Creates a new StockOpname model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StockOpname();
        $model->tanggal_stock_opname = \common\helpers\Timeanddate::getCurrentDate();
        $model->nama_kegiatan = "Stock Opname ".\common\helpers\Timeanddate::getShortDateIndo($model->tanggal_stock_opname);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_stock_opname]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing StockOpname model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_stock_opname]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StockOpname model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StockOpname model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return StockOpname the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StockOpname::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page (stockopname ID) does not exist.');
    }

    protected function findModelStokOpnameItem($id)
    {
        if (($model = StockOpnameItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page (stockopnameitem ID) does not exist.');
    }

    protected function findModelGudang($id)
    {
        if (($model = Gudang::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page (Gudang ID)does not exist.');
    }

    public function actionViewPerInventory($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);

        return $this->render('view-per-inventory', [
            'model' => $this->findModel($id),
            'i' =>$i,
            'id_stock_opname' =>$id
        ]);

       
    }

    private function getStockOpnameStatus($id_gudang, $id_stock_opname){
        $data = \backend\models\StockOpnameStatus::find()->where([
                'id_stock_opname' => $id_stock_opname,
                'id_gudang' => $id_gudang,
            ])
            ->one();

        if($data == null){
            //Jika Belum Ada dibuat
            $model = new \backend\models\StockOpnameStatus();
            $model->id_gudang = $id_gudang;
            $model->id_stock_opname = $id_stock_opname;
            $model->status = 'PROGRES';
            $model->tgl_dibuat = \common\helpers\Timeanddate::getCurrentDate();
            $model = \common\helpers\LogHelper::setCreatedLog($model);
            $model->save(false);
            return $model;
        }else{
            $data = \common\helpers\LogHelper::setModifiedLog($data);
            $data->save(false);
            return $data;
        }
    }

    public function actionEntryData($i, $g, $opt="bc")
    {
        $id_stock_opname = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $id_gudang = \common\utils\EncryptionDB::encryptor('decrypt',$g);
        $gudang = $this->findModelGudang($id_gudang);

        //Update Entry Data
        $this->getStockOpnameStatus($id_gudang,$id_stock_opname);

        return $this->render('entry_data', [
            'model' => $this->findModel($id_stock_opname),
            'i' =>$i,
            'g' =>$g,
            'id_stock_opname'=>$id_stock_opname,
            'id_gudang'=> $id_gudang,
            'gudang'=> $gudang,
            'opt' => $opt,
        ]);

       
    }

    public function actionHasilStockOpname($i, $g, $opt="bc", $t=1)
    {
        $id_stock_opname = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $id_gudang = \common\utils\EncryptionDB::encryptor('decrypt',$g);
        $gudang = $this->findModelGudang($id_gudang);

        return $this->render('hasil-stock-opname', [
            'model' => $this->findModel($id_stock_opname),
            'i' =>$i,
            'g' =>$g,
            'id_stock_opname'=>$id_stock_opname,
            'id_gudang'=> $id_gudang,
            'gudang'=> $gudang,
            'opt' => $opt,
            't' =>$t,
        ]);

       
    }

    public function actionDeleteItem($x, $i, $g)
    {
        //$model = $this->findModelItem($id_item);       
        $id_stockopname_item = \common\utils\EncryptionDB::encryptor('decrypt',$x);
        $id_stock_opname = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $id_gudang = \common\utils\EncryptionDB::encryptor('decrypt',$g);

        $model = $this->findModelStokOpnameItem($id_stockopname_item);
        $model->delete();

        return $this->redirect(['entry-data', 'i' => $i, 'g' => $g]);
    }

    public function actionPostMessageSession(){
        //Untuk debuging lokal
        //Contoh : http://localhost/minierp/administrator/sales-order/post-message-session?msg=2003000000009&iso=48
        //$_POST['msg'] = $_GET['msg'];
        //$_POST['iso'] = $_GET['iso'];
       
       //echo "masuk"; exit();

        if(isset($_POST['msg'])){
            //echo $_POST['msg'];
            //echo "data sudah diterima";

            $id_stock_opname = 0;
            if(isset($_POST['iso'])){
                $id_stock_opname = $_POST['iso']*1;
            }
            echo '<br>';

            if($id_stock_opname <= 0){
                echo '<div class="alert alert-danger">Anda salah posisi di stock opname!</div>';
                exit();
            }

            $id_gudang = 0;
            if(isset($_POST['ig'])){
                $id_gudang = $_POST['ig']*1;
            }else{
                echo '<div class="alert alert-danger">Gudang belum anda pilih! Silakan ulangi dari depan!</div>';
                exit();
            }

            $barcode = strip_tags($_POST['msg']);
            if($barcode == ""){
                echo '<div class="alert alert-danger">Silakan isi barcode terlebih dahulu</div>';
                exit();
            }

            $materialfinish = \backend\models\MaterialFinish::find()->where([
                'barcode_kode' => $barcode,
            ])
            ->one();
            if($materialfinish == null){
                 echo '<div class="alert alert-danger">Barang ['.$barcode.'] tidak dikenali. Pastikan sudah ada dalam data stock! &nbsp; ';
                 //echo \yii\helpers\Html::a('Tetap Catat Sebagai Kelebihan', ['create'], ['class' => 'btn btn-success']);
                 echo '<button type="submit"  class="btn btn-success" onClick="sendMessagePostSessionUnknown(\''.$barcode.'\')"> <i class="fa fa-plus"></i> TETAP MASUKKAN KE PENCATATAN</button>';
                 echo '</div>';
                exit();
            }


            $materialstockcount = \backend\models\StockOpnameItem::find()->where([
                    'redundat_barcode_code' => $barcode,
                    'id_gudang' => $id_gudang,
                    'id_stock_opname' => $id_stock_opname,
                ])
                ->count();
            //echo $id_stock_opname." ".$id_gudang."=="; exit();
            if($materialstockcount <= 0){
                    
                $this->saveStockOpnameItem($materialfinish, $id_gudang, $id_stock_opname, $barcode);
                echo '<div class="alert alert-info">Data dengan kode <b>['.$barcode.']</b> berhasil ditambahkan.</div>';

            }else{
                echo '<div class="alert alert-warning">Data produk ini ['.$barcode.'] sudah discan sebelumnya (sudah masuk)!.</div>';
            }

            exit();


        }

    }

    public function actionPostMessageSessionUnknown(){
        //Untuk debuging lokal
        //Contoh : http://localhost/minierp/administrator/sales-order/post-message-session?msg=2003000000009&iso=48
        //$_POST['msg'] = $_GET['msg'];
        //$_POST['iso'] = $_GET['iso'];

        /*
        Memasukkan data tanpa ngecek apakah sudah exist datanya di material finish atau belum
        */
       
       //echo "masuk"; exit();

        if(isset($_POST['msg'])){
            //echo $_POST['msg'];
            //echo "data sudah diterima";

            $id_stock_opname = 0;
            if(isset($_POST['iso'])){
                $id_stock_opname = $_POST['iso']*1;
            }
            echo '<br>';

            if($id_stock_opname <= 0){
                echo '<div class="alert alert-danger">Anda salah posisi di stock opname!</div>';
                exit();
            }

            $id_gudang = 0;
            if(isset($_POST['ig'])){
                $id_gudang = $_POST['ig']*1;
            }else{
                echo '<div class="alert alert-danger">Gudang belum anda pilih! Silakan ulangi dari depan!</div>';
                exit();
            }

            $barcode = strip_tags($_POST['msg']);
            if($barcode == ""){
                echo '<div class="alert alert-danger">Silakan isi barcode terlebih dahulu</div>';
                exit();
            }

            $this->saveStockOpnameItemUnknown($id_gudang, $id_stock_opname, $barcode);
            echo '<div class="alert alert-info">Data dengan kode <b>['.$barcode.']</b> berhasil ditambahkan.</div>';

            exit();


        }

    }

    public function actionPostMessageSessionKodeBarangUnknown(){
        //Untuk debuging lokal
        //Contoh : http://localhost/minierp/administrator/sales-order/post-message-session?msg=2003000000009&iso=48
        //$_POST['msg'] = $_GET['msg'];
        //$_POST['iso'] = $_GET['iso'];

        /*
        Memasukkan data tanpa ngecek apakah sudah exist datanya di material finish atau belum
        */
       
       //echo "masuk"; exit();

        if(isset($_POST['msg'])){
            //echo $_POST['msg'];
            //echo "data sudah diterima";

            $id_stock_opname = 0;
            if(isset($_POST['iso'])){
                $id_stock_opname = $_POST['iso']*1;
            }
            echo '<br>';

            if($id_stock_opname <= 0){
                echo '<div class="alert alert-danger">Anda salah posisi di stock opname!</div>';
                exit();
            }

            $id_gudang = 0;
            if(isset($_POST['ig'])){
                $id_gudang = $_POST['ig']*1;
            }else{
                echo '<div class="alert alert-danger">Gudang belum anda pilih! Silakan ulangi dari depan!</div>';
                exit();
            }

            $barcode = strip_tags($_POST['msg']);
            if($barcode == ""){
                echo '<div class="alert alert-danger">Silakan isi barcode terlebih dahulu</div>';
                exit();
            }

            $this->saveStockOpnameItemUnknown($id_gudang, $id_stock_opname, $barcode);
            echo '<div class="alert alert-info">Data dengan kode <b>['.$barcode.']</b> berhasil ditambahkan.</div>';

            exit();


        }

    }

    private function saveStockOpnameItem($materialfinish, $id_gudang, $id_stock_opname, $barcode){

        $stokcopnameitem = \backend\models\StockOpnameItem::find()->where([
                'id_material_finish' => $materialfinish->id_material_finish,
                'id_gudang' => $id_gudang,
                'id_stock_opname' => $id_stock_opname,
            ])
            ->one();

        if($stokcopnameitem == null){
            $stokcopnameitem = new \backend\models\StockOpnameItem();
        }else{
            //echo $materialfinish->id_material_finish;
            echo '<div class="alert alert-warning">Data produk ini sudah masuk ke data.</div>';
            exit();
        }
        $stokcopnameitem->id_gudang = $id_gudang;
        $stokcopnameitem->id_stock_opname = $id_stock_opname;
        $stokcopnameitem->id_material_finish = $materialfinish->id_material_finish;
        $stokcopnameitem->redundat_barcode_code = $barcode;

        $stokcopnameitem->entry_time = \common\helpers\Timeanddate::getCurrentDateTime();;
        $stokcopnameitem->created_user_id = Yii::$app->user->identity->id;

        //Hasil komparasi dengan eksisting
        $keterangan = '';
        if($materialfinish->id_gudang == $id_gudang){
            $keterangan = 'Sesuai';
            $stokcopnameitem->status = 'SESUAI';
        }else{
            $keterangan = 'Gudang tidak sesuai';
            echo '<div class="alert alert-warning">Data dengan kode <b>['.$barcode.']</b> berhasil ditambahkan tetapi informasi gudang tidak sesuai. Informasi terakhir barang ini tercatat di <b>gudang '.$materialfinish->gudang->nama_gudang.'</b>.</div>';
            $stokcopnameitem->keterangan = $keterangan;
            $stokcopnameitem->status = 'GUDANG TIDAK SESUAI';
            $stokcopnameitem->save(false);
            exit();
        }
        $stokcopnameitem->keterangan = $keterangan;
        $stokcopnameitem->save(false);

        echo '<div class="alert alert-info">Data dengan kode <b>['.$barcode.']</b> berhasil ditambahkan.</div>';
        //echo 'masuk'; 
        exit();
    }

    private function saveStockOpnameItemUnknown($id_gudang, $id_stock_opname, $barcode){

        $stokcopnameitem = \backend\models\StockOpnameItem::find()->where([
                'redundat_barcode_code' => $barcode,
                'id_gudang' => $id_gudang,
                'id_stock_opname' => $id_stock_opname,
            ])
            ->one();

        if($stokcopnameitem == null){
            $stokcopnameitem = new \backend\models\StockOpnameItem();
        }else{
            //echo $materialfinish->id_material_finish;
            echo '<div class="alert alert-warning">Data produk yang tidak dikenali ini sudah masuk ke data.</div>';
            exit();
        }
        $stokcopnameitem->id_gudang = $id_gudang;
        $stokcopnameitem->id_stock_opname = $id_stock_opname;
        $stokcopnameitem->id_material_finish = 0;
        $stokcopnameitem->redundat_barcode_code = $barcode;
        $stokcopnameitem->status = 'TIDAK DIKENALI';
        $stokcopnameitem->entry_time = \common\helpers\Timeanddate::getCurrentDateTime();;
        $stokcopnameitem->created_user_id = Yii::$app->user->identity->id;

        //Hasil komparasi dengan eksisting
        $keterangan = 'Tidak dikenali';
        $stokcopnameitem->keterangan = $keterangan;
        $stokcopnameitem->save(false);

        echo '<div class="alert alert-info">Data dengan kode <b>['.$barcode.']</b> berhasil ditambahkan.</div>';
        //echo 'masuk'; 
        exit();
    }

    public function actionPostMessageSessionKodeBarang(){

        if(isset($_POST['msg'])){
            //echo $_POST['msg'];
            //echo "data sudah diterima";

            $id_stock_opname = 0;
            if(isset($_POST['iso'])){
                $id_stock_opname = $_POST['iso']*1;
            }
            echo '<br>';

            if($id_stock_opname <= 0){
                echo '<div class="alert alert-danger">Anda salah posisi di stock opname!</div>';
                exit();
            }

            $id_gudang = 0;
            if(isset($_POST['ig'])){
                $id_gudang = $_POST['ig']*1;
            }else{
                echo '<div class="alert alert-danger">Gudang belum anda pilih! Silakan ulangi dari depan!</div>';
                exit();
            }

            $kode = strip_tags($_POST['msg']);
            if($kode == ""){
                echo '<div class="alert alert-danger">Silakan isi kode barang terlebih dahulu</div>';
                exit();
            }

            $materialfinish = \backend\models\MaterialFinish::find()->where([
                'kode' => $kode,
            ])
            ->one();
            if($materialfinish == null){
                 echo '<div class="alert alert-danger">Barang ['.$kode.'] tidak dikenali. Pastikan sudah ada dalam data stock! &nbsp; ';
                 //echo \yii\helpers\Html::a('Tetap Catat Sebagai Kelebihan', ['create'], ['class' => 'btn btn-success']);
                echo '<button type="submit"  class="btn btn-success" onClick="sendMessagePostSessionUnknown(\''.$kode.'\')"> <i class="fa fa-plus"></i> TETAP MASUKKAN KE PENCATATAN</button>';
                 echo '</div>';
                exit();
            }


            $materialstockcount = \backend\models\StockOpnameItem::find()->where([
                    'redundat_barcode_code' => $materialfinish->barcode_kode,
                    'id_gudang' => $id_gudang,
                    'id_stock_opname' => $id_stock_opname,
                ])
                ->count();
            //echo $id_stock_opname." ".$id_gudang."=="; exit();
            if($materialstockcount <= 0){
                    
                $this->saveStockOpnameItem($materialfinish, $id_gudang, $id_stock_opname, $kode);
                echo '<div class="alert alert-info">Data dengan kode <b>['.$kode.']</b> berhasil ditambahkan.</div>';

            }else{
                echo '<div class="alert alert-warning">Data produk ini ['.$kode.'] sudah discan sebelumnya (sudah masuk)!.</div>';
            }

            exit();


        }

    }
}
