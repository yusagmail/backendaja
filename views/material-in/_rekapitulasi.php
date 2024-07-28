<?php
use backend\models\MaterialFinish;

?>

<style>
  .summary-total{
    font-size: 30px;
  }

  .description-block{
    background-color: #f7f7f7;
    padding : 6px;
  }
</style>

<?php
$countRoll = MaterialFinish::find()
    ->where(['id_material_in' => $id,
        ])
    ->count();

$susut_prosentase = 0;
if($total_yard_awal > 0){
  $susut_prosentase = round((($total_yard_awal - $total_yard_hasil)/$total_yard_awal)*100,2);
}
?>

<div class="box-footer">
    <div class="row">
      <div class="col-sm-2 col-xs-6">
        <div class="description-block border-right">
          <span class="description-percentage text-yellow"></span>
          <h5 class="description-header text-green"><span class="summary-total"><?= $total_yard_awal ?></span></h5>
          <span class="description-text">TOTAL YARD AWAL</span>
        </div>
        <!-- /.description-block -->
      </div>
      <!-- /.col -->
      <div class="col-sm-2 col-xs-6">
        <div class="description-block border-right">
          <span class="description-percentage"></span>
          <h5 class="description-header text-blue"><span class="summary-total"><?= $total_yard_hasil ?></span></h5>
          <span class="description-text">TOTAL YARD ULANG</span>
        </div>
        <!-- /.description-block -->
      </div>
      <!-- /.col -->
      <div class="col-sm-2 col-xs-6">
        <div class="description-block border-right">
          <span class="description-percentage"></span>
          <h5 class="description-header text-red"><span class="summary-total"><?= $total_buang ?></span></h5>
          <span class="description-text">TOTAL BUANG</span>
        </div>
        <!-- /.description-block -->
      </div>

      <!-- /.col -->
      <div class="col-sm-2 col-xs-6">
        <div class="description-block border-right">
          <span class="description-percentage"></span>
          <h5 class="description-header text-yellow"><span class="summary-total"><?= $total_selisih_lebih ?></span></h5>
          <span class="description-text">SELISIH LEBIH</span>
        </div>
        <!-- /.description-block -->
      </div>
      <!-- /.col -->
      <div class="col-sm-2 col-xs-6">
        <div class="description-block border-right">
          <span class="description-percentage"></span>
          <h5 class="description-header text-yellow"><span class="summary-total"><?= $susut_prosentase?>%</span></h5>
          <span class="description-text">SUSUT</span>
        </div>
        <!-- /.description-block -->
      </div>
      <div class="col-sm-2 col-xs-6">
        <div class="description-block border-right">
          <span class="description-percentage"></span>
          <h5 class="description-header text-black"><span class="summary-total"><?= $countRoll ?></span></h5>
          <span class="description-text">ROLL</span>
        </div>
        <!-- /.description-block -->
      </div>
      <!-- /.col -->

    </div>
    <!-- /.row -->
  </div>