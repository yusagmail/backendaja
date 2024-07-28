<?php

use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\Owner;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Owner */

$baseName = AppVocabularySearch::getValueByKey('Owner');
$this->title = $baseName;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="owner-view box box-primary">
    <div class="box-header with-border">

        <?= Html::a('<< Back', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id_owner], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_owner], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        </p>

        <?php
        $listColumnDynamic = AppFieldConfigSearch::getListDetailView(Owner::tableName());

        //CustomColumn
        $coltypeAsset = [
            'attribute' => 'id_owner',
        ];
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_owner', $coltypeAsset);

        //unset($listColumnDynamic['file1']);
        $listColumnDynamic = AppFieldConfigSearch::removeField($listColumnDynamic, 'file1');

        $field1 = "file1";
        $listColumnDynamic[] =
        [
                'label'=>AppFieldConfigSearch::getLabelName(Owner::tableName(), "file1", ""),
                'format' => 'raw',
                'value'=>function ($model) use ( $field1) {
                    //$i = EncryptionDB::staticEncryptor("encrypt",$model->id_location_unit);
                    if($model->$field1 != ""){
                        $url = '../..' . '/web/' ."uploads/owner/".$model->$field1;
                        return Html::a('<i class="fa fa-download"></i> Download File / View File', $url, 
                            ['class' => 'btn btn-warning btn-xs']
                        );
                    }else{
                        return "-- (Belum Ada File)";
                    }
                },
        ];

        echo DetailView::widget([
            'model' => $model,
            'attributes' => $listColumnDynamic,
        ]) ?>

</div>
