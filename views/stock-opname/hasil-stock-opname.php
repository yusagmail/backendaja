<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Gudang;
use backend\models\GudangSearch;
use backend\models\MaterialFinish;
use backend\models\MaterialFinishSearch;
use backend\models\StockOpnameItemSearch;
use kartik\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\StockOpname */

//$this->title = $model->id_stock_opname;
$this->title = 'Hasil '.' Stock-Opname';
$this->params['breadcrumbs'][] = ['label' => 'Stock Opname', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body stock-opname-view">

        <?= $this->render('_view_stock_opname', [
            'model' => $model,
        ]) ?>

        <?php
        //Informasi Gudang
        echo '
                <div class="small-box bg-red">
                    <div class="inner text-right">
                      <h4>GUDANG : '.$gudang->nama_gudang.'</h4>
                    </div>
                </div>
        ';
        ?>

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <?php 
                /*
                $url_menu1 = Url::toRoute(['stock-opname/hasil-stock-opname', 'i'=>$i, 'g'=>$g, 't'=>1]);
                echo '<li class="active"><a href="' . $url_menu1 . '" >Stock Opname</a></li>';

                $url_menu2 = Url::toRoute(['stock-opname/hasil-stock-opname', 'i'=>$i, 'g'=>$g, 't'=>2]);
                echo '<li class="active"><a href="' . $url_menu2 . '" >Barang</a></li>';
                */
                ?>
                <?php
                $label = ["Stock Check", "Selisih Kurang", "Selisih Lebih"];
                for($x=1;$x<=3;$x++){
                    $url = "";
                    $name ="Adade".$x;
                    $active = "";
                    if ($t == $x) {
                        $active = "active";
                    }
                    $url_menu = Url::toRoute(['stock-opname/hasil-stock-opname', 'i'=>$i, 'g'=>$g, 't'=>$x]);
                    echo '
                        <li class="' . $active . '"><a href="' . $url_menu . '" >' . $label[$x-1]. '</a></li>
                        ';
                }
                ?>
            </ul>
            <div class="tab-content">
                <?php

                switch ($t) {
                    case 1:
                        $searchModel = new StockOpnameItemSearch();
                        $searchModel->id_stock_opname = $id_stock_opname;
                        $searchModel->id_gudang = $id_gudang;
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        $dataProvider->pagination->pageSize = 10;

                        //$dataProvider->pagination = false;
                        //$pagination = 10;
                        
                        //$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
                        $dataProvider->sort->defaultOrder = ['entry_time' => SORT_DESC];

                        echo $this->render('/stock-opname/hasil-stock-opname/index-multi', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'g' =>$g,
                            'i'=>$i,
                            'ip'=> $i, //Sementara
                            'opt'=>$opt,
                            'id_stock_opname'=>$id_stock_opname,
                            'id_gudang'=> $id_gudang,
                        ]);
                        break;


                    // Selisih Kurang
                    // Yang belum ikut terscan
                    case 2:
                        //echo 'Selisih Kurang';
                        $searchModel = new MaterialFinishSearch();
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        $query = new yii\db\Query();
                        $query->select('*

                                ')
                            ->from('material_finish');


                        //$subQuery = "SELECT * FROM stock_opname_item b WHERE a.id_material_finish = b.id_material_finish";
                        $subQuery = (new \yii\db\Query)
                            ->select([new \yii\db\Expression('1')])
                            ->from('stock_opname_item b')
                            ->where('material_finish.id_material_finish = b.id_material_finish');
                        $query->where(['not exists', $subQuery]);
                        $query->andWhere(['=','id_gudang', $id_gudang]);

                        /*

                        $connection = Yii::$app->getDb();
                        $command = $connection->createCommand("
                            SELECT * FROM material_finish a WHERE NOT EXISTS (SELECT * FROM stock_opname_item b WHERE a.id_material_finish = b.id_material_finish)");

                        $query = $command->queryAll();
                        */

                        $pagination = 10;
                        $dataProvider = new yii\data\ActiveDataProvider([
                            'query' => $query,
                            'pagination' => ['pageSize' => $pagination],
                            //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
                        ]);

                        echo $this->render('/stock-opname/hasil-stock-opname/index-selisih-kurang', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'g' =>$g,
                            'i'=>$i,
                            'id_stock_opname'=>$id_stock_opname,
                        ]);
                        break;
                    case 3:
                        echo 'No.3';
                        
                        break;

                }

                ?>
            </div>
            <!-- /.tab-content -->
        </div>

    </div>
</div>
