<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\AssetMaster;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMaster */

$this->title = CommonActionLabelEnum::VIEW . ' ' . AppVocabularySearch::getValueByKey(' Asset Master');
$this->params['breadcrumbs'][] = ['label' => 'Asset Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asset-master-view box box-success">
    <div class="box-header with-border">
        <p>
            <?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a(CommonActionLabelEnum::UPDATE, ['update', 'id' => $model->id_asset_master], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(CommonActionLabelEnum::DELETE, ['delete', 'id' => $model->id_asset_master], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => CommonActionLabelEnum::CONFIRM_DELETE,
                    'method' => 'post',
                ],
            ]) ?>

        </p>

        <?php
        /*
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
//                'id_asset_master',
                'asset_name',
                'id_asset_code',
                'asset_code',
                [
                    'label' => 'Type Asset 1',
                    'attribute' => 'typeAsset1.type_asset'
                ],
                [
                    'label' => 'Type Asset 2',
                    'attribute' => 'typeAsset2.type_asset'
                ],
                [
                    'label' => 'Type Asset 3',
                    'attribute' => 'typeAsset3.type_asset'
                ],
                [
                    'label' => 'Type Asset 4',
                    'attribute' => 'typeAsset4.type_asset'
                ],
                [
                    'label' => 'Type Asset 5',
                    'attribute' => 'typeAsset5.type_asset'
                ],
                'attribute1',
                'attribute2',
                'attribute3',
                'attribute4',
                'attribute5',
            ],
        ])
        */
        ?>


        <?php
        $listColumnDynamic = AppFieldConfigSearch::getListDetailView(AssetMaster::tableName());

        //CustomColumn
        $coltypeAsset = [
            'attribute' => 'typeAsset1.type_asset',
        ];
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_type_asset1', $coltypeAsset);

        echo DetailView::widget([
            'model' => $model,
            'attributes' => $listColumnDynamic,
        ]) ?>
    </div>
</div>

<div class="row">	
    <div class="col-md-6">		
		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Standard - Akuntansi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <?php /*<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>*/ ?>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
			<?= $form->field($model, 'id_account_code')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'id_mst_accrual')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'account_umur_economic_age')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'account_residual_value')->textInput(['maxlength' => true]) ?>
        </div>
        <!-- /.box-body -->

      </div>
	</div>
	
    <div class="col-md-6">		
		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Standard Lainnya</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <?php /*<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>*/ ?>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
			<?= $form->field($model, 'attribute1')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'attribute2')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'attribute3')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'attribute4')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'attribute5')->textInput(['maxlength' => true]) ?>
        </div>
        <!-- /.box-body -->

      </div>
	</div>
</div>