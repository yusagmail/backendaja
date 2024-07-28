<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MrpProjectProductItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Target Product';
$this->params['breadcrumbs'][] = $this->title;
?>

<script src="https://code.jscharting.com/latest/jscharting.js"></script>
<div class="box">
    <div class="box-body mrp-project-product-item-index">

    
        <div id="chartDiv" style="width: 100%; height: 400px;"></div>
        <script type="text/javascript">
            JSC.Chart("chartDiv", {
              series: [
                {
                  points: [{ x: "A", y: 10 }, { x: "B", y: 5 }]
                }
              ]
            });
        </script>
    </div>
</div>
