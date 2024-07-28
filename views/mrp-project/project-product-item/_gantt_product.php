<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MrpProjectProductItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Target Product';
$this->params['breadcrumbs'][] = $this->title;

//Referensi : https://jscharting.com/tutorials/types/js-gantt-chart/
?>

<script src="https://code.jscharting.com/latest/jscharting.js"></script>
<div class="box">
    <div class="box-body mrp-project-product-item-index">

    
        <div id="chartDiv" style="width: 100%; height: 400px;"></div>
        <script type="text/javascript">
            JSC.Chart("chartDiv", {
              type: "horizontal column",
              zAxis_scale_type: "stacked",
              xAxis_scale_type: "time",
              //legend_defaultEntry_value: "{days(%yRangeSums*1)}d",
              marker_visible: true,
              //y: ["1/1/2019", "1/1/2019"],

              series: [
                {
                  //points: [{ x: "A", y: 10 }, { x: "B", y: 5 }],

                  /*
                  points: [
                    { id: "first", x: "First Project", y: ["1/1/2019", "2/1/2019"] },
                    {
                      id: "second",
                      //Depends on first project
                      parent: "first",
                      x: "Second Project",
                      y: ["2/1/2019", "3/1/2019"]
                    }
                  ],
                  */
                  points: [
                    { id: "first", x: "First Project", y: ["10/1/2019", "2/1/2019"] , complete: [0.25, 1]},
                    { id: "second", x: "Second Project", y: ["20/1/2019", "10/1/2019"] , complete: [0.25, 1]},
                    /*
                    { id: "second", x: "Second Project", y: ["1/1/2019", "10/1/2019"] },
                    {
                      id: "final",
                      //Depends on first and second project
                      parent: "first,second",
                      x: "Final Phase",
                      y: ["3/1/2019", "3/1/2019"]
                    }
                    */
                  ],

                },
                {
                  points: [
                    { id: "first", x: "First Project", y: ["10/1/2019", "2/1/2019"] , complete: [0.25, 1]},
                    { id: "second", x: "Second Project", y: ["20/1/2019", "10/1/2019"] , complete: [0.25, 1]},
                    /*
                    { id: "second", x: "Second Project", y: ["1/1/2019", "10/1/2019"] },
                    {
                      id: "final",
                      //Depends on first and second project
                      parent: "first,second",
                      x: "Final Phase",
                      y: ["3/1/2019", "3/1/2019"]
                    }
                    */
                  ],

                }
              ]
            });
        </script>
    </div>
</div>
