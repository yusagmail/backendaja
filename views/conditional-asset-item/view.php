<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use CodeItNow\BarcodeBundle\Utils\QrCode;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem */

$masterAset = "";
if(isset($model->assetMaster)){
	$masterAset = $model->assetMaster->asset_name;
}else{
	$masterAset = "--";
}

$this->title = $masterAset." | ".$model->label1;
$this->params['breadcrumbs'][] = ['label' => 'Asset Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
    .text-muted{
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 90%;
    }
    img.center {
        display: block;
        margin: 0 auto;
    }
    img {
        width: 100%;
        height: 100%;
    }
</style>
<div class="asset-item-view box box box-primary">
	<?php /*
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_asset_item], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_asset_item], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
	*/ ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_asset_item',
            //'id_asset_master',
			[
				'attribute' => 'id_asset_master',
				'value' => function ($model) {
					if(isset($model->assetMaster)){
						return $model->assetMaster->asset_name;
					}else{
						return "--";
					}
				},
			],
			[
				'attribute' => 'label1',
				'label' => AppFieldConfigSearch::getLabelName($model::tableName(),'label1'),
				//'label' => $model::tableName(),
				'visible' =>AppFieldConfigSearch::getVisibleLabelName($model::tableName(),'label1'),
			],
			[
				'attribute' => 'label2',
				'label' => AppFieldConfigSearch::getLabelName($model::tableName(),'label2'),
				'visible' =>AppFieldConfigSearch::getVisibleLabelName($model::tableName(),'label2'),
			],
			[
				'attribute' => 'label3',
				'label' => AppFieldConfigSearch::getLabelName($model::tableName(),'label3'),
				'visible' =>AppFieldConfigSearch::getVisibleLabelName($model::tableName(),'label3'),
			],
            [
				'attribute' => 'number1',
				'label' => AppFieldConfigSearch::getLabelName($model::tableName(),'number1'),
				'visible' =>AppFieldConfigSearch::getVisibleLabelName($model::tableName(),'number1'),
			],
            [
				'attribute' => 'number2',
				'label' => AppFieldConfigSearch::getLabelName($model::tableName(),'number2'),
				'visible' =>AppFieldConfigSearch::getVisibleLabelName($model::tableName(),'number2'),
			],
            [
				'attribute' => 'number3',
				'label' => AppFieldConfigSearch::getLabelName($model::tableName(),'number3'),
				'visible' =>AppFieldConfigSearch::getVisibleLabelName($model::tableName(),'number3'),
			],
			/*
            'picture1',
            'picture2',
            'picture3',
            'id_asset_received',
            'id_asset_item_location',
			*/
        ],
    ]) ?>

</div>

<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                <?php
                $imgDefault = "no-image.jpg";
                if (isset($model->picture1)){
                    echo '<img class="profile-user-img img-responsive img-circle" src="../images/asset_item/' . $model->picture1 . '" alt="Foto Aset" style="width:120px;" />';
                }else{
                    echo '<img class="profile-user-img img-responsive img-circle" src="../images/' . $imgDefault . '" alt="Background" style="width:120px;" / >';

                }
                ?>
              <h3 class="profile-username text-center">Nama Barang</h3>

              <p class="text-muted text-center">Dikelola : Pak Budi</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Kerusakan</b> <a class="pull-right">2</a>
                </li>
                <li class="list-group-item">
                  <b>Perbaikan</b> <a class="pull-right">3</a>
                </li>
                <li class="list-group-item">
                  <b>Umur Ekonomis</b> <a class="pull-right">4</a>
                </li>
              </ul>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">CODE NUMBER</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> BARCODE</strong>

              <p class="text-muted">
                  <?php
                  $barcode = new BarcodeGenerator();
                  $print = $model->number1;
                  $barcode->setText($print);
                  $barcode->setType(BarcodeGenerator::Code128);
                  $barcode->setScale(5);
                  $barcode->setThickness(25);
                  $barcode->setFontSize(10);
                  $code = $barcode->generate();
                  echo '<img class="center" src="data:image/png;base64,'.$code.'" />';
                 ?>
                  <br/>
                  <a href="#" class="btn btn-primary btn-block"><b>CETAK</b></a>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i>QR-CODE</strong>

              <p class="text-muted">
                    <?php
                    $print = $model->number1;
                    $qrCode = new QrCode();
                    $qrCode
                        ->setText($print)
                        ->setSize(200)
                        ->setPadding(10)
                        ->setErrorCorrection('high')
                        ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
                        ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
                        ->setLabel('Scan Qr Code')
                        ->setLabelFontSize(14)
                        ->setImageType(QrCode::IMAGE_TYPE_PNG)
                    ;
                    echo '<img class="center" src="data:'.$qrCode->getContentType().';base64,'.$qrCode->generate().'" />';

                    // display directly to the browser
                    header('Content-Type: '.$qrCode->getContentType());
                    //        echo $qrCode->writeString();
                    ?>
			   <a href="#" class="btn btn-primary btn-block"><b>CETAK</b></a>
			  </p>

              <hr>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Detail</a></li>
              <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Pergerakan Pengguna</a></li>
			  <li class=""><a href="#reportkerusakan" data-toggle="tab" aria-expanded="false">Laporan Kerusakan</a></li>
              <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Laporan</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="activity">
                <!-- Post -->
                <div class="post">
                  -- Ini nanti buat detail --

                </div>
              </div>



              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->


              <div class="tab-pane" id="reportkerusakan">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
