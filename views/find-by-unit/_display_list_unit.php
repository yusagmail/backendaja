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
                <tr data-id="111" data-parent="11" data-level="3">
                    <td data-column="name"> &nbsp; &nbsp; 1. Struktur</td>
                    <td>30%</td>
                    <td><input type="text"></td>
                </tr>
                <tr data-id="1111" data-parent="111" data-level="4">
                    <td data-column="name"> &nbsp; &nbsp; &nbsp; i. Detail Struktur</td>
                    <td>30%</td>
                    <td><input type="text"></td>
                </tr>
                <tr data-id="12" data-parent="1" data-level="2">
                    <td data-column="name"> &nbsp; b. Komunikasi</td>
                    <td> &nbsp; &nbsp; 30%</td>
                    <td><input type="text"></td>
                </tr>
                <tr data-id="13" data-parent="1" data-level="2">
                    <td data-column="name"> &nbsp; c. Kendali Mutu</td>
                    <td> &nbsp; &nbsp; 30%</td>
                    <td><input type="text"></td>
                </tr>
                <tr data-id="14" data-parent="1" data-level="2">
                    <td data-column="name"> &nbsp; d. Mitigasi Resiko</td>
                    <td> &nbsp; &nbsp; 10%</td>
                    <td><input type="text"></td>
                </tr>
                <tr data-id="2" data-parent="0" data-level="1">
                    <td data-column="name">II. Kualitas</td>
                    <td>35%</td>
                    <td><input type="text"></td>
                </tr>
                <tr data-id="21" data-parent="2" data-level="2">
                    <td data-column="name"> &nbsp; a. Kual 1</td>
                    <td> &nbsp; &nbsp; 30%</td>
                    <td><input type="text"></td>
                </tr>
                <tr data-id="22" data-parent="2" data-level="2">
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
                '<span class="treegrid-expander glyphicon glyphicon-chevron-right"></span>' +
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
            '<span class="treegrid-indent" style="width:' + 15 * level + 'px"></span>' +
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
