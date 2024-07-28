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
        foreach($units as $unit){
            //echo $unit->name."<Br>";
            echo '
                <tr data-id="'.$unit->id_location_unit.'" data-parent="'.$id_parent.'" data-level="'.$level.'">
                    <td data-column="name">'.$unit->number_reg.'. '.$unit->name.'</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            ';
            getListItem($unit->id_location_unit,$level+1);
        }
    }
?>

<table id="tree-table" class="table table-hover table-bordered">
    <tbody>
        <th>#Nama Unit</th>
        <th>Status</th>
        <th>Keterangan</th>
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
