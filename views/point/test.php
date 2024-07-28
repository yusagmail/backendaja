<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Point';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body point-index">
 <div id="index-panel">
    <input type="checkbox" id="el122" name="selection[]" value="122" checked="" data-checkid="122">Atus<Br>
    <input type="checkbox" id="el123" name="selection[]" value="123" checked="" data-checkid="123">Atus<Br>
    <input type="checkbox" id="el124" name="selection[]" value="124" checked="" data-checkid="124">Atus<Br>
    <input type="checkbox" id="el125" name="selection[]" value="125" checked="" data-checkid="125">Atus<Br>

            <button class="viewrow1 glyphicon glyphicon-eye-open" data-viewid="2" data-lat="-6.807270" data-long="106.628963"></button>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                console.log("wow");
                $('#index-panel').on('click', 'button[data-viewid]', function() {
                    var id = $(this).data('viewid');
                    console.log("id:"+id);
                });

                $('#index-panel').on('change', 'input[type="checkbox"][data-checkid]', function() {
                    console.log("Checkbox in this part Is checked");
                    var id = $(this).data('checkid');
                    console.log("id:"+id);
                    if (this.checked) {
                        console.log("Checkbox dengan ID " + id + " telah dicentang.");
                    } else {
                        console.log("Checkbox dengan ID " + id + " telah unceklist.");
                    }
                });

                $("#el122").change(function(){
                   //console.log("Checkbox Is checked");
                   if ($('#el122').is(":checked"))
                    {
                      // it is checked
                      console.log("checked");
                      var val = $('#el122').val();
                      console.log(val);
                    }else{
                        console.log("unchecked");
                    }
                });
            </script>
        <p>
            <?= Html::a('Add Point', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
            'icon',
            'color',
            'latitude',
            'longitude',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
