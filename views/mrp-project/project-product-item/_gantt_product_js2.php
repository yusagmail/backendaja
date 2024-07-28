<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\chartjs\ChartJs;
use yii\helpers\ArrayHelper;

use backend\models\Pelanggaran;
use common\helpers\Timeanddate;
use yii\web\JsExpression;

?>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<style>
  
  .graph_container{
  display:block;
  width:600px;
}
</style> 
<div class="graph_container">
                            <canvas id="myChart"></canvas>
            </div>
           <div id="chartDiv" style="width: 100%; height: 400px;"></div>
<canvas id="myChart" style="width:100%;"></canvas>

<script type="text/javascript">

  var barOptions_stacked = {
    hover :{
        animationDuration:10
    },
    scales: {
        xAxes: [{
            label:"Duration",
            ticks: {
                beginAtZero:true,
                fontFamily: "'Open Sans Bold', sans-serif",
                fontSize:11
            },
            scaleLabel:{
                display:false
            },
            gridLines: {
            }, 
            stacked: true
        }],
        yAxes: [{
            gridLines: {
                display:false,
                color: "#fff",
                zeroLineColor: "#fff",
                zeroLineWidth: 0
            },
            ticks: {
                fontFamily: "'Open Sans Bold', sans-serif",
                fontSize:11
            },
            stacked: true
        }]
    },
    legend:{
        display:false
    },
};

  var myChart = new Chart("myChart", {
    type: 'horizontalBar',
    data: {
        labels: ["Prod.1", "Prod.2", "Prod.3", "Prod.4"],
        
        datasets: [{
            data: [50,150, 300, 100, 500],
            backgroundColor: "rgba(63,103,126,0)",
            hoverBackgroundColor: "rgba(50,90,100,0)"
            
        },{
            data: [100, 100, 200, 200, 100],
            backgroundColor: ['red', 'green', 'blue', 'yellow'],
        }]
    },
    options: barOptions_stacked,
});
</script>

<script type="text/javascript">
  var barOptions_stacked = {
    hover :{
        animationDuration:10
    },
    scales: {
        xAxes: [{
            label:"Duration",
            ticks: {
                beginAtZero:true,
                fontFamily: "'Open Sans Bold', sans-serif",
                fontSize:11
            },
            scaleLabel:{
                display:false
            },
            gridLines: {
            }, 
            stacked: true
        }],
        yAxes: [{
            gridLines: {
                display:false,
                color: "#fff",
                zeroLineColor: "#fff",
                zeroLineWidth: 0
            },
            ticks: {
                fontFamily: "'Open Sans Bold', sans-serif",
                fontSize:11
            },
            stacked: true
        }]
    },
    legend:{
        display:false
    },
};

var ctx = document.getElementById("chartDiv");
var myChart = new Chart(ctx, {    
    type: 'horizontalBar',
    data: {
        labels: ["1", "2", "3", "4"],
        
        datasets: [{
            data: [50,150, 300, 400, 500],
            backgroundColor: "rgba(63,103,126,0)",
            hoverBackgroundColor: "rgba(50,90,100,0)"
            
        },{
            data: [100, 100, 200, 200, 100],
            backgroundColor: ['red', 'green', 'blue', 'yellow'],
        }]
    },
    options: barOptions_stacked,
});

// this part to make the tooltip only active on your real dataset
var originalGetElementAtEvent = myChart.getElementAtEvent;
myChart.getElementAtEvent = function (e) {
    return originalGetElementAtEvent.apply(this, arguments).filter(function (e) {
        return e._datasetIndex === 1;
    });
}

</script>