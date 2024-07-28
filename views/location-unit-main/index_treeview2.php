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

<?php
/* @var $this yii\web\View */
/* @var $categories app\models\Category[] */

$this->title = 'Category Treeview';
$this->registerJsFile('@web/js/jstree/jstree.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
//echo json_encode($categories);
?>
<div id="jstree">
    <!-- in this example the tree is populated from inline HTML -->
    <ul>
      <li>Root node 1
        <ul>
          <li id="child_node_1">Child node 1</li>
          <li>Child node 2</li>
        </ul>
      </li>
      <li>Root node 2</li>
    </ul>
  </div>
  <button>demo button</button>

  <!-- 4 include the jQuery library -->
  <script src="dist/libs/jquery.js"></script>
  <!-- 5 include the minified jstree source -->
  <script src="dist/jstree.min.js"></script>
  <script>
  $(function () {
    // 6 create an instance when the DOM is ready
    $('#jstree').jstree();
    // 7 bind to events triggered on the tree
    $('#jstree').on("changed.jstree", function (e, data) {
      console.log(data.selected);
    });
    // 8 interact with the tree - either way is OK
    $('button').on('click', function () {
      $('#jstree').jstree(true).select_node('child_node_1');
      $('#jstree').jstree('select_node', 'child_node_1');
      $.jstree.reference('#jstree').select_node('child_node_1');
    });
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
