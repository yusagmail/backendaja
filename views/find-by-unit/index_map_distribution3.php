<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\LocationUnit;
use backend\models\Location;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LocationUnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Find By Unit';
$this->params['breadcrumbs'][] = $this->title;

?>

<style>
  body {
    margin: 0;
    background-color: #ffffff;
  }

  #denahContainer {
    width: 90vw;
    height: 100vh;
  }

  canvas {
    display: block;
  }

  .controls {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 10;
  }

  .controls button {
    display: block;
    margin-bottom: 10px;
  }
</style>
<div class="box">
  <div class="box-body asset-location-index">
    <div class="box-body">
      <div id="tooltips" class="tooltips" style="position: absolute; background-color: white; border: 1px solid black; padding: 5px; display: none; pointer-events: none;">
      </div>

      <style>
        .treegrid-expander {
          cursor: pointer;
        }

        .treegrid-expander.level-1 {
          color: red;
        }

        .treegrid-expander.level-2 {
          color: green;
        }

        .treegrid-expander.level-3 {
          color: blue;
        }

        .treegrid-expander.level-4 {
          color: purple;
        }

        .treegrid-indent {
          display: inline-block;
          width: 15px;
        }
      </style>

      <?php

      use yii\helpers\Url;

      function getListItem($id_parent, $level = 2)
      {
        $units = \backend\models\LocationUnit::find()
          ->where(['id_location_unit_parent' => $id_parent])
          ->all();

        foreach ($units as $unit) {
          $has_children = \backend\models\LocationUnit::find()
            ->where(['id_location_unit_parent' => $unit->id_location_unit])
            ->exists();

            $icon = '';
          $script = '';
          if ($level == 3 && !$has_children) {
            $icon = '<span id="icon-' . $unit->id_location_unit . '" class="glyphicon glyphicon-chevron-right"></span>';
            $script = 'onclick="toggleAssets(' . $unit->id_location_unit . ')"';
          }

          echo '
        <tr data-id="' . $unit->id_location_unit . '" data-parent="' . $id_parent . '" data-level="' . $level . '">
                <td data-column="name" '.$script.'>'.$icon.' '.$unit->number_reg .". ". $unit->name . '</td>            <td>' . Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $unit->id_location_unit]) . ' ' .
            Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $unit->id_location_unit], [
              'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
              ],
            ]) . '</td>
        </tr>';
              

          if ($level == 3) {
            // Tabel untuk menampilkan assets
            echo '<tr id="assets-' . $unit->id_location_unit . '" style="display:none;">
                <td colspan="3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Assets</th>
                                <th>Kategori Barang</th>
                                <th>Kode Master</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="assets-table-' . $unit->id_location_unit . '">
                            <!-- Assets akan dimuat di sini melalui AJAX -->
                        </tbody>
                        <tfoot>
                            <tr>
                               <td colspan="3">' . Html::a('Create Asset', ['asset-item-search/create'], ['class' => 'btn btn-success']) . '</td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>';
          }

          getListItem($unit->id_location_unit, $level + 1);
        }
      }
      ?>

      <table id="tree-table" class="table table-hover table-bordered">
        <tbody>
          <th>#Nama Unit</th>
          <th>Actions</th>

          <?php
          $units = \backend\models\LocationUnit::find()
            ->where(['id_location_unit_parent' => 0])
            ->all();
          foreach ($units as $unit) {
            echo '
                <tr data-id="' . $unit->id_location_unit . '" data-parent="0" data-level="1">
                    <td data-column="name"> '.$unit->number_reg .". " . $unit->name . '</td>                    <td>' . Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $unit->id_location_unit],) . ' ' .
              Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $unit->id_location_unit], [
                'data' => [
                  'confirm' => 'Are you sure you want to delete this item?',
                  'method' => 'post',
                ],
              ]) . '</td>
                </tr>';

            //Proses Recursive
            getListItem($unit->id_location_unit, 2);
          }
          ?>
        </tbody>
      </table>

      <?php
      $basepath = Yii::$app->request->BaseUrl;
      ?>
      <script src="<?= $basepath ?>/js/jquery/jquery-3.6.0.min.js"></script>
      <script>
        $(function() {
          var $table = $('#tree-table'),
            rows = $table.find('tr');

          rows.each(function(index, row) {
            var $row = $(row),
              level = $row.data('level'),
              id = $row.data('id'),
              $columnName = $row.find('td[data-column="name"]'),
              children = $table.find('tr[data-parent="' + id + '"]');

            if (children.length) {
              var expander = $columnName.prepend('' +
                '<span class="treegrid-expander glyphicon glyphicon-chevron-right level-' + level + '"></span>' +
                '');

              children.hide();

              expander.on('click', function(e) {
                var $target = $(e.target);
                if ($target.hasClass('glyphicon-chevron-right')) {
                  $target
                    .removeClass('glyphicon-chevron-right')
                    .addClass('glyphicon-chevron-down');

                  showChildren(id);
                } else {
                  $target
                    .removeClass('glyphicon-chevron-down')
                    .addClass('glyphicon-chevron-right');

                  hideChildren(id);
                }
              });
            }

            $columnName.prepend('' +
              '<span class="treegrid-indent" style="width:' + (15 * level) + 'px"></span>' +
              '');
          });

          function showChildren(parentId) {
            var children = $table.find('tr[data-parent="' + parentId + '"]');
            children.show();
            children.each(function(index, child) {
              var $child = $(child);
              if ($child.find('.glyphicon-chevron-down').length) {
                showChildren($child.data('id'));
              }
            });
          }

          function hideChildren(parentId) {
            var children = $table.find('tr[data-parent="' + parentId + '"]');
            children.hide();
            children.each(function(index, child) {
              hideChildren($(child).data('id'));
              $(child).find('.glyphicon-chevron-down')
                .removeClass('glyphicon-chevron-down')
                .addClass('glyphicon-chevron-right');
            });
          }
        });
      </script>

      <script>
        function toggleAssets(id) {
          // Get the icon by its unique ID
          var icon = document.getElementById('icon-' + id);

          // Toggle the icon
          if (icon.classList.contains('glyphicon-chevron-right')) {
            icon.classList.remove('glyphicon-chevron-right');
            icon.classList.add('glyphicon-chevron-down');
          } else {
            icon.classList.remove('glyphicon-chevron-down');
            icon.classList.add('glyphicon-chevron-right');
          }
          var $assetsRow = $('#assets-' + id);
          if ($assetsRow.is(':visible')) {
            $assetsRow.hide();
          } else {
            $.get("get-list-location-unit3?idp=" + id, function(data) {
              var assets = JSON.parse(data);
              var $assetsTable = $('#assets-table-' + id);
              $assetsTable.empty();
              count = 1;
              assets.forEach(function(asset) {
                var editUrl = '<?= Url::to(['asset-item-search/view-stock']) ?>' + '?i=' + asset.i + '&action=update&idi=' + asset.idi;
                var createUrl = <?= json_encode(Url::to(['asset-item-location-unit/create', 'id' => ''])) ?> + id;
                $assetsTable.append(
                  '<tr>' +
                  '<td>' + count + '</td>' +
                  '<td>' + asset.keterangan + '</td>' +
                  '<td>' + asset.type_asset + '</td>' +
                  '<td>' + asset.number1 + '</td>' +
                  '<td>' +
                  '<a href="' + editUrl + '" class="btn btn-primary btn-xs">Edit</a> ' +
                  '</td>' +
                  '</tr>'
                );
                count++;
              });
              $assetsRow.show();
            });
          }
        }

        function getDataFromParent(idp) {
          show3D();
          console.log(idp);
          $.get("get-list-location-unit?idp=" + idp, function(data, status) {
            jsonData = data;
            loadRoomsFromJson(jsonData);
          });
        }

        function getDataFromParentFor2D(idp) {
          show2D();
          console.log(idp);
          $.get("get-list-location-unit2?idp=" + idp, function(data, status) {
            jsonData = data;
            load2DRoomFromsJson(jsonData);
          });
        }
      </script>

      <script>
        function show2D() {
          document.getElementById('denahContainer').style.display = 'block';
          document.getElementById('denahContainer3D').style.display = 'none';
        }

        function show3D() {
          document.getElementById('denahContainer').style.display = 'none';
          document.getElementById('denahContainer3D').style.display = 'block';
        }
      </script>

      <br>
      <div id="denahContainer" style="border: solid 1px black; width: 100%; height: 600px;display: none;"></div>
    </div>
  </div>
</div>

<?php
echo $this->render('_display_denah_from_db3', [
  //'model' => $model,
]);
?>

<?= $this->render('_display_denah2d_from_db4', [
  //'model' => $model,
]) ?>