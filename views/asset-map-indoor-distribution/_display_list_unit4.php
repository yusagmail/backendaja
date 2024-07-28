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

?>
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
function getListItem($id_parent, $level=2){
    $units = \backend\models\LocationUnit::find()
        ->where(['id_location_unit_parent' => $id_parent])
        ->all();

$total_rows = \backend\models\LocationUnit::find()
    ->where(['id_location_unit_parent' => $id_parent])
    ->count();


    $button_is_displyed = false;
    foreach($units as $unit){
        $has_children = \backend\models\LocationUnit::find()
            ->where(['id_location_unit_parent' => $unit->id_location_unit])
            ->exists();

        echo '
            <tr data-id="'.$unit->id_location_unit.'" data-parent="'.$id_parent.'" data-level="'.$level.'">
                <td data-column="name">'.$unit->number_reg.'. '.$unit->name.'</td>
               
                <td>(x:'.$unit->denah_start_x.',y:'.$unit->denah_start_y.')
                (pjg:'.$unit->denah_panjang.',lbr:'.$unit->denah_lebar.')</td>';
        
        if (!$has_children && $button_is_displyed == false) {
            echo '<td rowspan="'.$total_rows.'">
            <button class="btn btn-primary" onclick="getDataFromParentFor2D('.$id_parent.')">Display Denah (2D) </button>
            <button class="btn btn-success" onclick="getDataFromParent('.$id_parent.')">Display Denah (3D) </button>
            </td>';
            $button_is_displyed = true;
        }

        echo '</td>
            </tr>
        ';
        getListItem($unit->id_location_unit, $level+1);
    }
}
?>

<table id="tree-table" class="table table-hover table-bordered">
    <tbody>
        <th>#Nama Unit</th>
        <th>Status</th>
        <th>Display Denah</th>
    <?php
        $units = \backend\models\LocationUnit::find()
            ->where(['id_location_unit_parent' => 0])
            ->all();
        foreach($units as $unit){
            //echo $unit->name."<Br>";
            echo '
                <tr data-id="'.$unit->id_location_unit.'" data-parent="0" data-level="1">
                    <td data-column="name">'.$unit->number_reg.'. '.$unit->name.'</td>
                    
                    <td>-</td>
                </tr>
            ';

            //Proses Recursive
            getListItem($unit->id_location_unit,2);
        }
    ?>
    </tbody>
</table>


<?php
$basepath = Yii::$app->request->BaseUrl;
?>
<script src="<?= $basepath ?>/js/jquery/jquery-3.6.0.min.js"></script>
<script>
  $(function () {
    var $table = $('#tree-table'),
        rows = $table.find('tr');

    rows.each(function (index, row) {
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

            expander.on('click', function (e) {
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
        children.each(function (index, child) {
            var $child = $(child);
            if ($child.find('.glyphicon-chevron-down').length) {
                showChildren($child.data('id'));
            }
        });
    }

    function hideChildren(parentId) {
        var children = $table.find('tr[data-parent="' + parentId + '"]');
        children.hide();
        children.each(function (index, child) {
            hideChildren($(child).data('id'));
            $(child).find('.glyphicon-chevron-down')
                .removeClass('glyphicon-chevron-down')
                .addClass('glyphicon-chevron-right');
        });
    }
});
</script>

<script>
    function getDataFromParent(idp){
        show3D();
        console.log(idp);
        $.get("get-list-location-unit?idp="+idp, function(data, status){
            // alert(data);
            jsonData = data;
            loadRoomsFromJson(jsonData);
            //$( "#msginfo").text( "Result : " + data );
          });
    }

    function getDataFromParentFor2D(idp){
        show2D();
        console.log(idp);
        $.get("get-list-location-unit2?idp="+idp, function(data, status){
            // alert(data);
            jsonData = data;
            load2DRoomFromsJson(jsonData);
            //$( "#msginfo").text( "Result : " + data );
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
