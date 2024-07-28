<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialFinishSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Konsolidasi - Barang Jadi';
$this->params['breadcrumbs'][] = $this->title;

$tabs = array();
$tabs[1] = "Kode Lama";
$tabs[2] = "Kode Baru";
$tabs[3] = "Kode Anomali";

?>
<div class="box">
    <div class="box-body material-finish-index">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <?php
              foreach($tabs as $key=>$value){
                $class = '';
                if($key == $t){
                    $class = 'active';
                }
                $url_menu1 = Url::toRoute(['material-konsolidasi/index-kode', 't'=>$key]);
                echo '<li class="'.$class.'"><a href="'.$url_menu1.'"  aria-expanded="false">'.$value.'</a></li>';
              }
              ?>

              <?php /*
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Kode Lama</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Kode Baru</a></li>
              */
              ?>

            </ul>
            <div class="tab-content">
              <?php
              
              switch($t){
                case 1: 
                    echo $this->render('index-full', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'subtitle' => $tabs[$t],
                            't'=>$t,
                        ]);
                    break;
                    
                case 2: 
                    echo $this->render('index-full', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'subtitle' => $tabs[$t],
                            't'=>$t,
                        ]);
                    break;
                
                case 3: 
                    echo $this->render('index-full', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'subtitle' => $tabs[$t],
                            't'=>$t,
                        ]);
                    break;  

              }
              
              ?>
            </div>
            <!-- /.tab-content -->
          </div>



    

    </div>
</div>