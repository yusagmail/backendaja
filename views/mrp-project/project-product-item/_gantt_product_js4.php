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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<style>
  
  .graph_container{

  width:600px;
}
</style> 
<div class="graph_container">
  <canvas id="myChart"></canvas>
</div>
<hr>
AWA
<hr>
<canvas id="myChart2" style="width:600px;"></canvas>
<script type="text/javascript">

  var barOptions_stacked = {
    hover :{
        animationDuration:10
    },
    scales: {
        xAxes: [{
            label:"Duration",
            //type: 'time',
            ticks: {
                beginAtZero:true,
                fontFamily: "'Open Sans Bold', sans-serif",
                fontSize:11,
                //min: 10,
                stepSize : 100,
                userCallback: function(value, index, values) {
                  // Convert the number to a string and splite the string every 3 charaters from the end
                  value = value+5;
                  value = Date(1355496152000);
                  value = value.toString();
                  value = value.split(/(?=(?:...)*$)/);
                  // Convert the array to a string and format the output
                  value = value.join('.');
                  return 'Rp' + value;
               }
            },
            scaleLabel:{
                display: true,
                labelString: 'Tanggal'
            },
            gridLines: {
            }, 
            stacked: true,
            labelString: 'probability'

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
            stacked: true,
            title: {
              display: true,
              text: 'Your Title'
            }
        }]
    },
    legend:{
        display:false
    },
};

  var myChart = new Chart("myChart", {
    type: 'horizontalBar',
    data: {
        labels: ["Prod.1X", "Prod.2", "Prod.3", "Prod.4"],
        
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


var myChart = new Chart("myChart2", {
  type: 'line',
  options: {
    scales: {
      xAxes: [{
        type: 'time',
      }]
    }
  },
  data: {
    labels: ["2015-03-15T13:03:00Z", "2015-03-25T13:02:00Z", "2015-04-25T14:12:00Z"],
    datasets: [{
      label: 'Demo',
      data: [{
          t: '2015-03-15T13:03:00Z',
          y: 12
        },
        {
          t: '2015-03-25T13:02:00Z',
          y: 21
        },
        {
          t: '2015-04-25T14:12:00Z',
          y: 32
        }
      ],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1
    }]
  }
});
</script>