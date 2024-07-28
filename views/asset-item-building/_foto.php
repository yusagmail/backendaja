<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\asset_item */

//$this->title = $model->id_asset_item;

?>


    <?php

    $basepath = Yii::$app->request->baseUrl;

    ?>
  
    <div class="box-body" style="">
               <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <?php $imgpath = $model->picture1; 
                     //echo $basepath.'/images/asset_item/'.$imgpath;
                    ?>
                    <?php if($model->picture1 != "") :?>
                        <img class="img-responsive" height="250px" src="<?php echo $basepath.'/images/asset_item/'.$imgpath; ?>" alt="Foto jauh"/>
                    <?php else: ?>
                        <img class="img-responsive" height="250px"  src="<?php echo $basepath. '/'."images/asset_item/nopic.jpg" ?>" alt="Foto jauh"/>    
                    <?php endif?>
                    <div class="carousel-caption">
                      Foto Jauh
                    </div>
                  </div>
                  <div class="item">
                    <?php $imgpath = $model->picture1; ?>
                    <?php if($model->picture1 != "") :?>
                    <img class="img-responsive" height="250px"  src="<?php echo $basepath.'/images/asset_item/'.$imgpath; ?>" alt="Foto 1"/>
                    <?php else: ?>
                        <img class="img-responsive" height="250px"  src="<?php echo $basepath. '/'."images/asset_item/nopic.jpg" ?>" alt="Foto 1"/>    
                    <?php endif?>
                    <div class="carousel-caption">
                      Foto Depan
                    </div>
                  </div>

                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
    </div>
