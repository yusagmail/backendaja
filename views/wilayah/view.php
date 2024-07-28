<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Kelurahan;
use backend\models\AppFieldConfigSearch;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\Kelurahan */

$this->title = CommonActionLabelEnum::DETAIL.' '. AppVocabularySearch::getValueByKey(' Kelurahan');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Kelurahan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kelurahan-view box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <div class="box-header with-border">
        <p>
            <?= Html::a('<< '.CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
        </p>

		<?php /*
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
//                'id_kelurahan',
                'kecamatan.nama_kecamatan',
                'nama_kelurahan',
                'kodepos',
            ],
        ]) ?>
		*/ ?>
		
		<?php
		$tableName = Kelurahan::tableName(); //Ini yang diganti (Nama tabel dari modelnya)
		$listColumnDynamic = AppFieldConfigSearch::getListDetailView($tableName);
		
		//CustomColumn
		$coltypeAsset = [
			'attribute' => 'kecamatan.nama_kecamatan',
		];		
		$listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_kecamatan', $coltypeAsset);
		
		echo DetailView::widget([
            'model' => $model,
            'attributes' => $listColumnDynamic,
        ]) 
		?>
    </div>
</div>
