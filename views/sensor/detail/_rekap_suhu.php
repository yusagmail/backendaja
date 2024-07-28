<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\chartjs\ChartJs;
use yii\helpers\ArrayHelper;

use backend\models\SensorLog;
use common\helpers\Timeanddate;

?>


          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ionicons ion-thermometer"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Rata-Rata Suhu</span>
              <span class="info-box-number"><?= $avg; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                    Dimulai Sejak : 14.30
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ionicons ion-levels"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">MIN - MAX</span>
              <span class="info-box-number"><?= $min ?> - <?= $max ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                    Spread : <?= $spread ?> derajat
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ionicons ion-alert-circled"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TOTAL ALERT</span>
              <span class="info-box-number">4x</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                    Durasi Waktu Anomali : 1 jam, 23 menit
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
