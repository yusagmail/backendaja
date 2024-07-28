<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\LocationUnit;
use backend\models\Location;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LocationUnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CommonActionLabelEnum::LIST_ALL ." ". $mainLabel;
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="box">
    <div class="box-body">
          <table id="tree-table" class="table table-hover table-bordered">
            <tbody>

            <th>#Parameter</th>
            <th>Bobot</th>
            <th>Nilai</th>
                <tr data-id="1" data-parent="0" data-level="1">
                  <td data-column="name">I. Manajemen Proyek</td>
                  <td>20%</td>
                  <td><input type="text"></td>
                </tr>
                    <tr data-id="11" data-parent="1" data-level="2">
                      <td data-column="name"> &nbsp; a. Struktur dan Pengawakan</td>
                      <td> &nbsp; &nbsp; 30%</td>
                      <td><input type="text"></td>
                    </tr>
                        <?php /*
                        <tr data-id="4" data-parent="2" data-level="3">
                          <td data-column="name">1. Struktur</td>
                          <td>30%</td>
                          <td><input type="text"></td>
                        </tr>
                        */ ?>
                    <tr data-id="3" data-parent="1" data-level="2">
                      <td data-column="name"> &nbsp; b. Komunikasi</td>
                      <td> &nbsp; &nbsp; 30%</td>
                      <td><input type="text"></td>
                    </tr>
                    <tr data-id="4" data-parent="1" data-level="2">
                      <td data-column="name"> &nbsp; c. Kendali Mutu</td>
                      <td> &nbsp; &nbsp; 30%</td>
                      <td><input type="text"></td>
                    </tr>
                    <tr data-id="4" data-parent="1" data-level="2">
                      <td data-column="name"> &nbsp; d. Mitigasi Resiko</td>
                      <td> &nbsp; &nbsp; 10%</td>
                      <td><input type="text"></td>
                    </tr>
                        <?php /*
                        <tr data-id="4" data-parent="3" data-level="3">
                          <td data-column="name">1. Menerima Perintah</td>
                          <td>30%</td>
                          <td><input type="text"></td>
                        </tr>
                        <tr data-id="4" data-parent="3" data-level="3">
                          <td data-column="name">2. Laporan Perkembangan</td>
                          <td>30%</td>
                          <td><input type="text"></td>
                        </tr>
                        <tr data-id="4" data-parent="3" data-level="3">
                          <td data-column="name">3. Persetujuan Deviasi</td>
                          <td>30%</td>
                          <td><input type="text"></td>
                        </tr>
                        */ ?>
                <tr data-id="2" data-parent="0" data-level="1">
                  <td data-column="name">II. Kualitas</td>
                  <td>35%</td>
                  <td><input type="text"></td>
                </tr>
                    <tr data-id="22" data-parent="2" data-level="2">
                      <td data-column="name"> &nbsp; a. Kual 1</td>
                      <td> &nbsp; &nbsp; 30%</td>
                      <td><input type="text"></td>
                    </tr>
                    <tr data-id="23" data-parent="2" data-level="2">
                      <td data-column="name"> &nbsp; b. Kual 2</td>
                      <td> &nbsp; &nbsp; 30%</td>
                      <td><input type="text"></td>
                    </tr>
                <tr data-id="3" data-parent="0" data-level="1">
                  <td data-column="name">III. Ketepatan Waktu</td>
                  <td>35%</td>
                  <td><input type="text"></td>
                </tr>
                <tr data-id="4" data-parent="0" data-level="1">
                  <td data-column="name">IV. Penanganan Masalah</td>
                  <td>10%</td>
                  <td><input type="text"></td>
                </tr>
            </tbody>
            
          </table>
          <input type="submit" class="btn btn-success" value="Simpan">
    </div>
</div>

<?php /*
<div class="box">
    <div class="box-body">
          <table id="tree-table" class="table table-hover table-bordered">
            <tbody>
            <th>#</th>
              <th>Test</th>
            <tr data-id="1" data-parent="0" data-level="1">
              <td data-column="name">Node 1</td>
              <td>Additional info</td>
            </tr>
            <tr data-id="2" data-parent="1" data-level="2">
              <td data-column="name">Node 1</td>
              <td>Additional info</td>
            </tr>
            <tr data-id="3" data-parent="1" data-level="2">
              <td data-column="name">Node 1</td>
              <td>Additional info</td>
            </tr>
            <tr data-id="4" data-parent="3" data-level="3">
              <td data-column="name">Node 1</td>
              <td>Additional info</td>
            </tr>
            <tr data-id="5" data-parent="3" data-level="3">
              <td data-column="name">Node 1</td>
              <td>Additional info</td>
            </tr>
              </tbody>
            
          </table>
    </div>
</div>
*/ ?>
<?php
//$this->registerJsFile("@web/js/jquery/jquery-3.6.0.min.js");
$basepath =Yii::$app->request->BaseUrl;
//echo $basepath;
?>
<script src="<?= $basepath ?>/js/jquery/jquery-3.6.0.min.js"></script>
<script>
  $(function () {
    var
        $table = $('#tree-table'),
        rows = $table.find('tr');


    rows.each(function (index, row) {
        var
            $row = $(row),
            level = $row.data('level'),
            id = $row.data('id'),
            $columnName = $row.find('td[data-column="name"]'),
            children = $table.find('tr[data-parent="' + id + '"]');

        if (children.length) {
            var expander = $columnName.prepend('' +
                '<span class="treegrid-expander glyphicon glyphicon-chevron-right"></span>' +
                '');

            children.hide();

            expander.on('click', function (e) {
                var $target = $(e.target);
                if ($target.hasClass('glyphicon-chevron-right')) {
                    $target
                        .removeClass('glyphicon-chevron-right')
                        .addClass('glyphicon-chevron-down');

                    children.show();
                } else {
                    $target
                        .removeClass('glyphicon-chevron-down')
                        .addClass('glyphicon-chevron-right');

                    reverseHide($table, $row);
                }
            });
        }

        $columnName.prepend('' +
            '<span class="treegrid-indent" style="width:' + 15 * level + 'px"></span>' +
            '');
    });

    // Reverse hide all elements
    reverseHide = function (table, element) {
        var
            $element = $(element),
            id = $element.data('id'),
            children = table.find('tr[data-parent="' + id + '"]');

        if (children.length) {
            children.each(function (i, e) {
                reverseHide(table, e);
            });

            $element
                .find('.glyphicon-chevron-down')
                .removeClass('glyphicon-chevron-down')
                .addClass('glyphicon-chevron-right');

            children.hide();
        }
    };
});

</script>

<div class="box">
    <div class="box-body type-asset1-index">

        
        <p>
            <p>
            <?= Html::a(CommonActionLabelEnum::CREATE ." ". $mainLabel, ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </p>

    <div class="box-body">
        <?php 
        $listColumnDynamic = AppFieldConfigSearch::getListGridView(LocationUnit::tableName());

        $dataList1 = ['' => '-- Pilih --'] + \yii\helpers\ArrayHelper::map(Location::find()->all(), 'id_location', 'location_name');
        $colLocationUnit = [
            'label' => \backend\models\AppFieldConfigSearch::getLabelName(LocationUnit::tableName(), 'id_location'),
            'attribute' => 'location.location_name',
            'filter'=>Html::activeDropDownList($searchModel, 'id_location', $dataList1, ['class' => 'form-control']),
        ];      
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_location', $colLocationUnit);
        
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'striped' => true,
            'hover' => true,
            'responsiveWrap' => false,
            'panel' => ['type' => 'primary', 'heading' => $this->title],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => $listColumnDynamic,
        ]); ?>

    </div>

    <?php /*
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'type_asset',
                'description:ntext',
                'is_active',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    */ ?>
    
    </div>
</div>
