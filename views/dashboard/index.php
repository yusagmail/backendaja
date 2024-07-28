<?php

use backend\models\AssetItemRepairSearch;
use backend\models\AssetItemSearch;
use backend\models\AssetItemIncidentSearch;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = Yii::$app->name;
$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$val1 = 12; //hardcoded dulu
$val2 = 4; //
$val3 = 5; //
$val4 = 2;
$url1 = Url::to(['/dashboard/detail']);
$url2 = Url::to(['/dashboard/detail']);
$url3 = Url::to(['/dashboard/detail']);
$url4 = Url::to(['/dashboard/detail']);

?>
<script type="text/javascript">

    window.onload = setupRefresh;


    function setupRefresh() {

        setTimeout("refreshPage();", 60000); // milliseconds
        startTime();

    }

    function refreshPage() {
        window.location = location.href;
    }

    function startTime() {
        var dayarray = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday",
            "Friday", "Saturday")
        var dayarrayIndo = new Array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu")
        var montharray = new Array("January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December")
        var montharrayIndo = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
            "Agustus", "September", "Oktober", "November", "Desember")

        var today = new Date();
        // var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
        var date = dayarrayIndo[today.getDay()] + ', ' + today.getDate() + ' ' + montharrayIndo[today.getMonth()] + ' ' + today.getFullYear();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        // document.getElementById('date').innerHTML =
        //     date;
        document.getElementById('date').innerHTML =
            date + " - " + h + ":" + m + ":" + s;

        var t = setTimeout(startTime, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }
        ;  // add zero in front of numbers < 10
        return i;
    }

</script>

<section class="content">
    <div class="box box-solid bg-green-gradient">
        <div class="box-header">
            <i class="fa fa-calendar"></i>
            <h3 class="box-title">
                <span id="date"></span>
            </h3>
        </div>
    </div>
    <div class="row">
    </div>
    <!--    --><?php
    //    $model = new RequestPick;
    //    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Total Asset </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <?php
                            // var_dump()
                            ?>
                            <!-- small box -->
                            <div class="small-box bg-green-gradient">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3> <?= 
                                    (new \yii\db\Query())->select('*')->from('location_unit')->count()
                                    ?></h3>
                                    <p> Total Bangunan</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-calculator"></i>
                                </div>
                                <!-- <a href="<?= $url1 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-light-blue-gradient">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3> <?=
                                    // AssetItemSearch::getTotalAssetGodCondition() 
                                    (new \yii\db\Query())->select('*')->from('asset_received')->where(['id_status_received' => 1])->count()
                                    ?></h3>
                                    <p> Aset Kondisi Baik</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-android-checkmark-circle"></i>
                                </div>
                                <!-- <a href="<?= $url2 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-light-blue-gradient">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3> <?=
                                    // AssetItemSearch::getTotalAssetGodCondition() 
                                    (new \yii\db\Query())->select('*')->from('asset_received')->where(['id_status_received' => 2])->count()
                                    ?></h3>
                                    <p> Aset Kondisi Kurang Bagus</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-android-checkmark-circle"></i>
                                </div>
                                <!-- <a href="<?= $url2 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-light-blue-gradient">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3> <?=
                                    // AssetItemSearch::getTotalAssetGodCondition() 
                                    (new \yii\db\Query())->select('*')->from('asset_received')->where(['id_status_received' => 3])->count()
                                    ?></h3>
                                    <p> Aset Kondisi Rusak</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-android-checkmark-circle"></i>
                                </div>
                                <!-- <a href="<?= $url2 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow-gradient">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3><?= 
                                    // AssetItemSearch::getTotalAssetBadCondition() type_asset1
                                    (new \yii\db\Query())->select('*')->from('type_asset1')->count()
                                    ?></h3>
                                    <p> Total Asset Kategori</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-alert-circled"></i>
                                </div>
                                <!-- <a href="<?= $url3 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow-gradient">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3><?= 
                                    // AssetItemSearch::getTotalAssetBadCondition() type_asset1
                                    (new \yii\db\Query())->select('*')->from('asset_master')->count()
                                    ?></h3>
                                    <p> Total Asset Master</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-alert-circled"></i>
                                </div>
                                <!-- <a href="<?= $url3 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow-gradient">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3><?= 
                                    // AssetItemSearch::getTotalAssetBadCondition() type_asset1
                                    (new \yii\db\Query())->select('*')->from('asset_item_location_unit')->count()
                                    ?></h3>
                                    <p> Total Asset Item</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-alert-circled"></i>
                                </div>
                                <!-- <a href="<?= $url3 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red-gradient">
                                <div class="inner">
                                    <!--                    <h3>0</h3>-->
                                    <h3> <?=
                                    //AssetItemSearch::getTotalAssetBrokenCondition()
                                    (new \yii\db\Query())->select('*')->from('user')->count()
                                    ?></h3>
                                    <p> User</p>
                                </div>
                                <div class="icon">
                                    <i class="ionicons ion-close-circled"></i>
                                </div>
                                <!-- <a href="<?= $url4 ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div>
  <canvas id="myChart"></canvas>
</div>
<?php
// var_dump((new \yii\db\Query())->select('*')->from('asset_received')->all())
?>
<?php

// Fetch and group the data from the database
$data = (new \yii\db\Query())
    ->select(['received_date', 'COUNT(id_asset_master) AS count'])
    ->from('asset_received')
    ->groupBy('received_date')
    ->all();

// Prepare the data for the chart
$labels = [];
$counts = [];

foreach ($data as $row) {
    $labels[] = $row['received_date'];
    $counts[] = $row['count'];
}

$labelsJson = json_encode($labels);
$countsJson = json_encode($counts);


?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar', // You can change this to 'line', 'pie', etc.
    data: {
        labels: <?= $labelsJson ?>,
        datasets: [{
            label: 'Asset Item',
            data: <?= $countsJson ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>