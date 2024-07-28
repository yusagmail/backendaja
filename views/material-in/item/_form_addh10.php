<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\MaterialInItemProc */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }
</style>

<?php
//CSS Ini digunakan untuk overide jarak antar form biar tidak terlalu jauh
?>
<style>
    .form-group {
        margin-bottom: 0px;
        margin-top: 0px;
    }

</style>

<div class="material-in-item-proc-form">



    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        //'action' => ['index1'],
        //'method' => 'get',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-3',
                'offset' => 'col-lg-offset-4',
                'wrapper' => 'col-lg-9',
            ],
        ],
    ]); ?>

    <?php
    if ($model->hasErrors()) {
    ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model); ?>
        </div>
    <?php
    }
    ?>

    <?php
    $listBackingPacking1[0] = 'Belum Packing' ;
    $listBackingPacking2 = \yii\helpers\ArrayHelper::map(\backend\models\BasicPacking::find()->orderBy([
        'nama' => SORT_ASC
    ])->asArray()->all(), 'id_basic_packing', 'nama');
    $listBackingPacking = array_merge($listBackingPacking1, $listBackingPacking2);
    ?>

    <?php //= $form->field($model, 'id_material_in')->textInput() 
    ?>

<?php
$this->registerJs("
    $('.uang').number(true, 0, ',', '');
");

$this->registerJs('
    $(".uang").change(function(){
      var hasil1 = parseInt($("#materialinitemproc-yard_hasil1").val());
      var hasil2 = parseInt($("#materialinitemproc-yard_hasil2").val());
      var hasil3 = parseInt($("#materialinitemproc-yard_hasil3").val());
      var hasil4 = parseInt($("#materialinitemproc-yard_hasil4").val());
      var hasil5 = parseInt($("#materialinitemproc-yard_hasil5").val());
      var hasil6 = parseInt($("#materialinitemproc-yard_hasil6").val());
      var hasil7 = parseInt($("#materialinitemproc-yard_hasil7").val());
      var hasil8 = parseInt($("#materialinitemproc-yard_hasil8").val());
      var hasil9 = parseInt($("#materialinitemproc-yard_hasil9").val());
      var hasil10 = parseInt($("#materialinitemproc-yard_hasil10").val());

      var bs1 = parseInt($("#materialinitemproc-buang1").val());
      var bs2 = parseInt($("#materialinitemproc-buang2").val());

      var awal = parseInt($("#materialinitemproc-yard_awal").val());
      var total = hasil1+hasil2+hasil3+hasil4+hasil5+hasil6+hasil7+hasil8+hasil9+hasil10+bs1+bs2;
      var selisih = total - awal;

      if(awal == total){
        //alert("Ada kelebihan");
        $("div.total-title").html("<div class=\'alert alert-info\'>Sudah seimbang antara data awal dan hitungan ulang</div>");
      }else{
        if(awal > total){
            $("div.total-title").html("<div class=\'alert alert-danger\'>Data Awal <b>["+awal+"]</b> masih lebih banyak dibandingkan data hitungan ulang <b>["+total+"]</b>. Silakan lengkapi data hitungan ulang, jika ada BS silakan tulis BS</div>");
        }else{
            $("div.total-title").html("<div class=\'alert alert-warning\'>Data Hitungan ulang <b>["+total+"]</b> lebih banyak dibandingkan data hitungan awal <b>["+awal+"]</b>. Kelebihan yang lain sebesar <b>"+selisih+"</b>.Abaikan jika memang ada kelebihan</div>");
        }
      }
      
    });
');
/*

$this->registerJs("
    $('.uang').number(true, 0, ',', '.');
");

$this->registerJs('
    $(".uang").change(function(){
      alert("The paragraph was clicked.");
    });
    ');
*/
?>

    <div class="row">
        <?php //= $form->field($model, 'id_material_in')->textInput() 
        ?>
        <div class="col-md-6">
            <h3 class="box-title">Yard Awal</h3>
            <?= $form->field($model, 'yard_awal')->textInput(['class' => 'form-control uang','maxlength'=>4]) ?>
            <div class="form-group">
                <label class="control-label col-lg-4" for="materialinitemproc-yard_awal"> &nbsp; </label>
                <div class="col-lg-8">

                </div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="callout callout-success">
                <h4>Petunjuk</h4>

                <p>Silakan diisi dengan perhitungan awal dan hasil hitung ulang dan pemotongan jika ada. 
            Misal hitungan awal 100, dipotong menjadi 2 bagian 50 dan 50 maka di bagian H1 dan H2 silakan ditulis 50 dan 50.</p>
            </div>

        </div>
    </div>
    <div class="row">
       
            <h3 class="box-title">Yard Hitungan Ulang</h3>
             <div class="col-md-6">
            <?php /*
            <div class="form-group">
                
                <div class="col-lg-4">
                     <?= $form->field($model, 'yard_hasil1')->textInput() ?>
                </div>
                <div class="col-lg-4"> 
                    <?= $form->field($model, 'id_basic_packing1')->dropDownList(
                        $listBackingPacking,
                        //['prompt' => 'Pilih Basic Packing ...']
                    ); ?>
                </div>
                <div class="col-lg-4"> 
                    <?= $form->field($model, 'id_basic_packing1')->dropDownList(
                        $listBackingPacking,
                        ['prompt' => 'Pilih Basic Packing ...']
                    ); ?>
                </div>
            </div>
            */ ?>

            <?php
            for ($i=1;$i<=10;$i++){
                $field_yard_hasil = 'yard_hasil'.$i;
                $field_basic_packing = 'id_basic_packing'.$i;
            ?>
            <div class="form-group">
                
                <div class="col-lg-12">
                     <?= $form->field($model, $field_yard_hasil)->textInput([ 'class' => 'form-control uang','maxlength'=>4]) ?>
                </div>

            </div>
            <?php
            }
            ?>
            </div>
            <div class="col-md-6">
            <?php
            for ($i=1;$i<=2;$i++){
                $field_yard_hasil = 'buang'.$i;
                $field_basic_packing = 'id_basic_packing'.$i;
            ?>
            <div class="form-group">
                
                <div class="col-lg-12">
                     <?= $form->field($model, $field_yard_hasil)->textInput([ 'class' => 'form-control uang','maxlength'=>3]) ?>
                </div>

            </div>
            <?php
            }
            ?>
            <div class="total-title">
                first text
            </div>
        </div>
    </div>
    <?php /*
    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>
    */ ?>
    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>