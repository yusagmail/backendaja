<?php

/**
 * Created by PhpStorm.
 * User: Dany Panggabean
 * Date: 15/03/2019
 * Time: 12:53
 * <div class="form-group">

<?php
$addon = "<div class=\"input-group-append\"><span class=\"input-group-text\"><i class=\"fas fa-calendar-alt\"></i></span></div>";
//                                    echo '<label class="control-label">Date Range</label>';
echo '<div class="input-group drp-container">';
echo DateRangePicker::widget([
'name' => 'date_range_1',
'value' => '01-Jan-14 to 20-Feb-14',
'convertFormat' => true,
'useWithAddon' => true,
'pluginOptions' => [
'locale' => [
'format' => 'd-M-y',
'separator' => ' to ',
],
//                                                'opens' => 'left'
]
]) . $addon;
echo '</div>';
?>
</div>
 *
 *
 *
 *
 * <div class="box box-primary">
<div class="box-header with-border">
<?= Html::a('Bulanan', ['bulanan'], ['class' => 'btn btn-success btn-flat']) ?>
</div>

<div class="box-body">
<div class="row">

<div class="col-md-8 align">
<p>
<?php foreach ($models as $model) {

echo Html::encode($model->tgl_absensi . " >> " . $model->jml_sdh_presensi) . " Hadir <br>";

};
?>
</p>
</div>
</div>
</div>
</div>
 */

$this->title = 'Laporan Bulanan';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="perusahaan-index ">


    <div class="box box-primary">
        <div class="row">
            <div class="col-md-12">
                <div class="box-header with-border">
                    <h3 class="box-title">Laporan Bulanan</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    <?php
    foreach ($models as $model) {
        $dateList[] = $model->tgl_absensi;
        $presentList[] = $model->jml_sdh_presensi;
        $notPresentList[] = $model->jml_blm_presensi;
        $latePresentList[] = $model->jml_terlambat;
    }
    ?>

    var day = <?php echo json_encode($dateList); ?>;
    var present = <?php echo json_encode($presentList); ?>;
    var notpresent = <?php echo json_encode($notPresentList); ?>;
    var late = <?php echo json_encode($latePresentList); ?>;
    // utk random value
    var randomScalingFactor = function () {
        return Math.round(Math.random() * 100)
    };
    var lineChartData = {
        // labels: ["January", "February", "March", "April", "May", "June", "July"],
        labels: day,
        datasets: [
            {
                label: "Presensi",
                fillColor: "rgba(31,255,38,0.2)",
                strokeColor: "rgba(31,255,38,1)",
                pointColor: "rgba(31,255,38,1)",
                pointStrokeColor: "#0f0",
                pointHighlightFill: "#0f0",
                pointHighlightStroke: "rgba(0,200,10,1)",
                // data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
                data: present,
            },
            {
                label: "Tidak Presensi",
                fillColor: "rgba(255,27,46,0.2)",
                strokeColor: "rgba(255,27,46,1)",
                pointColor: "rgba(255,27,46,1)",
                pointStrokeColor: "#ff1a21",
                pointHighlightFill: "#ff1a21",
                pointHighlightStroke: "rgba(151,187,205,1)",
                // data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
                data: notpresent,
            },
            {
                label: "Terlambat",
                fillColor: "rgba(255,239,68,0.2)",
                strokeColor: "rgba(255,239,68,1)",
                pointColor: "rgba(255,239,68,1)",
                pointStrokeColor: "#fff942",
                pointHighlightFill: "#ffef36",
                pointHighlightStroke: "rgba(151,187,205,1)",
                // data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
                data: late,
            },
        ]

    }

    window.onload = function () {
        var ctx = document.getElementById("lineChart").getContext("2d");
        window.myLine = new Chart(ctx).Line(lineChartData, {
            responsive: true
        });
    }


    //Initialize Select2 Elements
    $('.select2').select2()

    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    )

    //Date picker
    $('#datepicker').datepicker({
        autoclose: true
    })

</script>

